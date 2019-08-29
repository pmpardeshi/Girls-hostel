# Girls-hostel merit list generator web app
  This is the project by Hackathon Club of Government College of Engineering And Reasearch Avasari.
  It allots the hostel seat for girls hostel on the basis of merit for college.
  The front end is designed using HTML/CSS/JS and at backend PHP/MYSQL is used.
  It takes Excel sheet as a input and output is generated as pdf file.
  The excel sheet contains the data of students applied for the girls hostel in the format specified by the DPU of GCOEARA.
  students have to apply at college and the excel sheet is generated at DPU itself. 
  The data in excel sheet is inserted in mysql database using php's PhpSpreadsheet library
  The logic is implemented at server side
  The constrains/conditions for seat allotment are provided by the Hostel Rector and the logic is build around these constrains
  The output or the result is converted to pdf format by fpdf library. 
  being the government college the constrains like community  based reservation is also included in the program
  The branch wise seat distribution is also included and need to be provided explicitly
