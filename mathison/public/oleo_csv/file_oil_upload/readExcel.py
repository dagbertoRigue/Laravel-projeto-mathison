'''
Author: Luiz Rossa
Preditiva Web
	2019
'''
import os
from subprocess import check_output as qx

try:
	exec = 'C:\\wamp\\www\\mathison\\public\\oleo_csv\\file_oil_upload\\Release\\readCsvFile.exe'
	os.system(exec)
except:
	print("Error has occurred!")
