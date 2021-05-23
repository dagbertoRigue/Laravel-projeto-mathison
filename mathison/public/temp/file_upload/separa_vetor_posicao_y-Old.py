#Script responsavel por ler os dados de um arquivo txt e separalos na posicao Y

import numpy as np

file1 = '/wamp/www/laravel/mathison/public/temp/file_upload/file_upload.txt'
data1 = open(file1, 'rt')
#vector = np.loadtxt(data1, delimiter=",")
vector = data1.read().split(",")
aux = 0
y = 2

for i in range(y):
    aux = vector[i::y]
print(aux)
