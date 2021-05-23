
#Script responsavel por ler os dados de um arquivo txt e separalos na posicao X

import numpy as np

file1 = '/wamp/www/laravel/mathison/public/temp/file_upload/file_upload.txt'
data1 = open(file1, 'rt')
vector = np.loadtxt(data1, delimiter=",")
aux = 0
x = 1

for i in range(x):
    aux = vector[i::x+1]
print(aux)

