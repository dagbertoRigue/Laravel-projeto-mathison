
#Script responsavel por ler os dados de um arquivo txt e separalos na posicao X

import numpy as np
import json

file1 = '/wamp/www/laravel/mathison/public/temp/file_upload/file_upload.txt'
data1 = open(file1, 'r')
vector = data1.read().split(",")
#print(vector)
#vector = np.loadtxt(data1, delimiter=",")
#vector = file1.split(",")
aux = 0
x = 1

for i in range(x):
    aux = vector[i::x+1]
print(aux)
#print(json.dumps(aux))

