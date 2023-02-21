from django.shortcuts import render
from django.http import HttpResponse


def index(request):
    return HttpResponse("Hello, world. You're at the polls index.")

def saludo(request):
    return HttpResponse("Hola mundo")

def navegador(request):
    return HttpResponse(request.META['CONTENT_TYPE'])