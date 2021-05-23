#Author: Luiz Gustavo Silveira Rossa

#SCRIPT RESPONSAVEL POR RECEBER O ARQUIVO ENVIADO PELO USUARIO DO SISTEMA

#Exemplo:
#No cmd do windows
#C:\Users\administrator.AUTOMATIONPR\PycharmProjects\script_classificador_teste_3  python script_classificador_teste_3.py Vetor1_normal.csv


#Resultado da classificacao
#0 - Normal
#1 - Alarme
#2 - Critico

import pickle
import numpy as np
from sklearn import metrics
from sklearn.metrics import precision_recall_fscore_support


# Parametros de configuracao do script para classificar a matriz
labels = None
pos_label = 1
average = 'binary'
sample_weight = None
target_names = None
target_values = None
sample_weight = None


# le o nome do arquivo informado pelo usuario
# for aux in sys.argv:
#    file = aux

# Recebe o arquivo cadastrado pelo usuario
# data = open(file, 'rt')
# vector = np.loadtxt(data, delimiter=",")

file1 = '/wamp/www/laravel/mathison/public/temp/file_upload/file_upload.txt'
data1 = open(file1, 'rt')
vector = np.loadtxt(data1, delimiter=",")


# carrega o script treinado
fileTrained = pickle.load(open('/wamp/www/laravel/mathison/public/temp/file_upload/teste_svm_treinado_teste_4.sav', 'rb'))
classifier = fileTrained
# print(fileTrained)


# PASSA PARA O SCRIPT OS DADOS DO ARQUIVO ENVIADO PELO USUARIO PARA SER UTILIZADO COMO VETOR DE CLASSIFICACAO
dataTest = [vector]
#VETORES UTILIZADOS NO TREINAMENTO
# 1- NORMAL
# 2- ALARME
# 3- CRITICO
target = [1, 2, 3]
test = classifier.predict(dataTest)

# Percorre cada um dos elementos do target e compara com o script treinado.
# Com isso e possivel determinar a precissao da classificacao para cada um dos targets treinados.
try:
    precision_list = []
    id_target = []
    max_value = []

    for i in target:
        aux = [i]
        #print("Target {}".format(aux))
        #print("\n")
        #print("Classification report for classifier %s:\n%s\n"
        #      % (classifier, metrics.classification_report(aux, test)))
        #print("Confusion matrix:\n%s" % metrics.confusion_matrix(aux, test))

        p, r, f1, s = precision_recall_fscore_support(aux, test,
                                                      labels=labels,
                                                      average=None,
                                                      sample_weight=sample_weight)

        # Captura a precissao de acerto para cada item classificado
        precision = np.average(p, weights=s)
        p = "{0:0.{1}f}".format(precision, 2)
        #print("Precision: {}".format(p))
        # id_target.append(i)
        precision_list.append(p)
        # precision_list.insert(i, p)
        #print("===============")

    for id, value in enumerate(precision_list):
        # print("List: [%d] = %d" %(id, value))
        #print(id, value)
        # Percorre a lista de precissao e captura o maior valor
        max_value = max(precision_list)
        # Captura o endereco onde o maior valor da lista esta armazenado
        id_value = precision_list.index(max_value)
        # print(max_value, id_value)
    #print("***")

    # CALCULA A MEDIA DA PRECISSAO PARA O VETOR CLASSIFICADO
    meanNormal = 0.00
    meanAlarm = 0.00
    meanCritical = 0.00

    # CONVERTE A LISTA DE STRING PARA UMA LISTA FLOAT
    new_list = map(float, precision_list)
    #list_len = len(precision_list)

    count = 5

    # GRUPOS DE CLASSIFICACAO
    group1 = [0, 1, 2]

    # SEPARA OS ELEMENTOS DA LISTA EM TRES GRUPOS COM CINCO ELEMENTOS EM CADA
    # groups = [new_list[i:i + count] for i in range(0, len(new_list), count)]
    # print(groups)

    for aux4 in group1:
        meanNormal = new_list.__getitem__(0)
        meanAlarm = new_list.__getitem__(1)
        meanCritical = new_list.__getitem__(2)
    # print(meanNormal)
    # print(meanAlarm)
    # print(meanCritical)

    # Classificacao da amostra analisada.
    if meanNormal >= 0.95:
        print("Normal")
    elif meanAlarm >= 0.95:
        print("Alarme")
    elif meanCritical >= 0.95:
        print("Critico")
except Exception:
    print("Problems to run classification !!!")
