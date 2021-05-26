# delete all data
delete from parent;
delete from child;
delete from enrollment;

## PARENT
insert into parent values(NULL,'John','R.','Smith',NULL,'123 Main St',NULL,'Chula Vista',
        'CA','91810','619-669-2525',NULL,NULL,NULL,NULL);
insert into parent values(NULL,'Sally','B.','Jones',NULL,'440 Beech #4',NULL,'San Diego',
        'CA','92102','858-993-5092',NULL,NULL,NULL,NULL);        
insert into parent values(NULL,'Jimmie','John','Carter',NULL,'4325 Camino Ruiz','Unit 25',
        'San Diego','CA','99324','619-232-5577',NULL,NULL,NULL,NULL);

  
-- ## CHILD
insert into child values(NULL,1,'Jimmie','Robert','Smith',NULL,'img_445.jpg',
    '08/15/2000',NULL);
insert into child values(NULL,1,'Sally','Jessica','Smith',NULL,'img_446.jpg',
    '04/25/2002',NULL);
insert into child values(NULL,3,'Aaron','James','Carter',NULL,'img_587.jpg',
    '02/03/1999',NULL);
    
## CAMP
insert into camp values(NULL,'Band');
insert into camp values(NULL,'Swimming');
insert into camp values(NULL,'Nature Discovery');
insert into camp values(NULL,'Basketball');
insert into camp values(NULL,'Physical Training');            

## ENROLLMENT
insert into enrollment values(1,1);
insert into enrollment values(1,2);
insert into enrollment values(2,2);
insert into enrollment values(4,1);
insert into enrollment values(5,1);