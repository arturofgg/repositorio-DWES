from django.shortcuts import render
from django.http import HttpResponse

def index(request):
    return HttpResponse("Hola, mundo. Este es el indice de polls")