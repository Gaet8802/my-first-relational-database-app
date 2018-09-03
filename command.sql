-- Les show:
-- Show all companies:
SELECT *
FROM Company
-- Show all suppliers:
SELECT Company.company_name, Company.company_address, company_phone, Company.company_type
FROM Company, Company_Type
WHERE Company.company_type = Company_Type.id AND Company_Type.type_name = 'supplier';
-- Show all customers:
SELECT Company.company_name, Company.company_address, company_phone, Company.company_type
FROM Company, Company_Type
WHERE Company.company_type = Company_Type.id AND Company_Type.type_name = 'Customer';
-- Show all Invoices:
SELECT Invoices.invoice_number, Invoices.id_company, Invoices.customer_name, Invoices.invoice_date, Invoices.designation
FROM Invoices
-- les add:
-- Add company
INSERT INTO `Company` (`
id`,
`company_name
`, `company_address`, `country`, `VAT_number`, `company_phone`, `company_type`) VALUES
(NULL, ‘nom
DeLaCompanie’, ‘addresseDeLaCompanie’, ‘paysDeL’addresse’, ‘TVA’, ‘phone’, '1SiCustomer/0SiSupplier’);

-- Add customer:

INSERT INTO `Customers` (`Customer_number`, `company`, `last_name`, `first_name`, `phone_number`, `email`) VALUES (NULL, ‘nomDeLaCompanie’, ‘lastName’, ‘firstName’, ‘phoneNumber’, ‘email’);

-- Add invoice:

INSERT INTO `Invoices` (`invoice_number`, `id_company`, `customer_name`, `invoice_date`, `designation`) VALUES (NULL, ‘numeroIdCompany’, ‘name’, ‘date’, ‘objet’);

-- les delete:

-- delete invoice:

DELETE FROM `Invoices` WHERE `Invoices`.`invoice_number` = invoice number 

-- delete customer:

DELETE FROM `Customers` WHERE `Customers`.`Customer_number` = customer number

-- delete company:

DELETE FROM `Company` WHERE `Company`.`id` = company number

-- les update

-- update company

UPDATE `Company` SET `company_name` = ’nameOfTheCompany’, `company_address` = ‘address’’ `country` = ‘pays’, `VAT_number` =’numDeTva’, `company_phone` = ‘numDeTel’, `company_type` = '0 ou 1’ WHERE `Company`.`id` = l’id;
-- update customer
UPDATE `Customers`
SET
`company` = ‘nameOfCompany’, `last_name` = ‘nom’, `first_name` = ‘prenom’, `phone_number` = ‘numeroDeTel’, `email`= ‘addresseMail’ WHERE `Customers`.`Customer_number` = leCustomer_number;
-- update invoice
UPDATE `Invoices`
SET
`id_company` = '5', `customer_name` = ‘nomCustomer’, `invoice_date` = ‘laDate’, `designation` = ‘laPrestation’ WHERE`Invoices`.`invoice_number` = leNumerod’invoice;
-- route company details
select Company.company_name, Company.company_address, Company.company_phone, Company.VAT_number, Invoices.invoice_number, Invoices.customer_name, Invoices.invoice_date, Invoices.designation
from Company, Invoices
where Company.id =
;
-- route involves details
SELECT Invoices.invoice_number, Invoices.invoice_date, Company.company_name, Company.company_type, Invoices.customer_name
FROM Invoices, Company
WHERE Invoices.invoice_number = numeroInvoice AND Company.id = Invoices.id_company;
-- route contact-details
select Customers.last_name, Customers.first_name, Customers.phone_number, Customers.email, Customers.company, Company.company_address, Invoices.invoice_number, Invoices.invoice_date, Invoices.designation
from Customers, Company, Invoices
where Customers.last_name = 'Marlair' AND Invoices.id_company = Company.id AND Customers.company = Company.company_nam