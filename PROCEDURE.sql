/* Prints out the loss and vin of cars that are sold with a negative revenue. */
CREATE OR REPLACE PROCEDURE LOSS
AS
  REVENUE Sell.Price_out%TYPE;
  VINNUM  Cars.Vin%TYPE;
  CURSOR C IS 
    SELECT S.Price_out - B.Price_in as p, S.Vin
    FROM Sell S JOIN Buy B ON S.In_id = B.In_id
    WHERE S.Price_out IS NOT NULL;
BEGIN
  OPEN C;
  LOOP
    FETCH C INTO REVENUE, VINNUM;
    EXIT WHEN (C%NOTFOUND);
    IF (REVENUE < 0) THEN
      DBMS_OUTPUT.PUT_LINE(' VIN: ' || VINNUM '   Loss :'||REVENUE);
    END IF;
  END LOOP;
  CLOSE C;
END;

/* Given start date and ending date as arguments, the procedure can print out all sale records during this period.*/
CREATE OR REPLACE PROCEDURE SALE_RECORDS(SDATE IN DATE, EDATE IN DATE)
AS
  NEWROW Trade_out%ROWTYPE;
  CURSOR C IS
    SELECT * From Trade_out;
BEGIN
  OPEN C;
  LOOP
    FETCH C INTO NEWROW;
    EXIT WHEN(C%NOTFOUND);
    IF(NEWROW.DATE > SDATE AND NEWROW.DATE < EDATE) THEN
      DBMS_OUTPUT.PUT_LINE(NEWROW.VIN||' was sold at price of ' ||NEWROW.PRICE_OUT||' by Customer '||NEWROW.B_SSN);
    END IF;
  END LOOP;
  CLOSE C;
END;
