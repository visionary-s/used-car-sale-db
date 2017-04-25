/* Count the total number of dealers before changing. */
CREATE OR REPLACE TRIGGER Dealers_count
  AFTER INSERT OR DELETE ON Dealers
    FOR EACH ROW
DECLARE
  n INTEGER;
BEGIN
  SELECT COUNT(*) INTO n FROM Dealers;
  DBMS_OUTPUT.PUT_LINE('There are now ' || n || ' dealers in total.');
END;

/* Show the change of the recommended retail price. */
CREATE OR REPLACE TRIGGER price_changes
  AFTER UPDATE ON Cars
    FOR EACH ROW
DECLARE
  price_CHANGE Cars.Rrp%TYPE;
BEGIN
  price_CHANGE:=:NEW.RRP;
  DBMS_OUTPUT.PUT_LINE('Old PRICE:'|| :OLD.RRP);
  DBMS_OUTPUT.PUT_LINE('New PRICE:'|| price_CHANGE);
END;

CREATE OR REPLACE TRIGGER sales_volume
  AFTER INSERT ON Sell
    FOR EACH ROW
DECLARE
  make_type Cars.Make%TYPE; 
  num_sale INTEGER; 
BEGIN 
  SELECT Make, COUNT(*) INTO make_type, num_sale
  FROM Cars, Sell WHERE Sell.Vin = Cars.Vin;
  IF (num_sale >5) THEN
  DBMS_OUTPUT.PUT_LINE('The sales volume of' || make_type ||'is Good');
  ELSIF (num_sale>3) THEN
  DBMS_OUTPUT.PUT_LINE('The sales volume of' || make_type ||'is Average');
  ELSIF (num_sale<4) THEN
  DBMS_OUTPUT.PUT_LINE('The sales volume of' || make_type ||'is Bad');
  END IF;
END;
