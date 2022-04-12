# helpfulcodes

#########Get Data from a comma seperated column in the database :colors-column name
select * from shirts where CONCAT(',', colors, ',') like '%,1,%'
But find_in_set also works:

select * from shirts where find_in_set('1',colors) <> 0
Snnipets -Autocomplete code 
