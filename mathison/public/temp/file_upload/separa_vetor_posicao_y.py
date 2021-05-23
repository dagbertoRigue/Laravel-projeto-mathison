
##Script responsavel por ler os dados de um arquivo txt e separalos na posicao Y

#import numpy as np
import json

#file1 = '/wamp/www/laravel/mathison/public/temp/file_upload/file_upload.txt'
#data1 = open(file1, 'r')
#vector = data1.read().split(",")
##print(vector)
##vector = np.loadtxt(data1, delimiter=",")
##vector = file1.split(",")
#aux = 0
#y = 2

#for i in range(y):
#    aux = vector[i::y+1]
#print(aux)


#Script responsavel por ler os dados de um arquivo txt e separalos na posicao Y

import numpy as np

file1 = '/wamp/www/laravel/mathison/public/temp/file_upload/file_upload.txt'
data1 = open(file1, 'r')
vector = data1.read().split(",")
#print(vector)
#vector = np.loadtxt(data1, delimiter=",")
#vector = file1.split(",")





aux = []
y = 2
aux2 = len(vector)
#print(aux2)
aux3 = 0
for i in range(y):
    aux = vector[i::y]
aux4 = [j.strip('\n\n') for j in aux]
#print(json.dumps(aux4))
print(aux4)

#def vetor(v):
#    aux4 = [j.strip('\n\n') for j in aux]
#    return aux4
#a = filter(vetor, aux)
#print(a)


