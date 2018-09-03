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
SELECT *
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

