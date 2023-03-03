from django.http import HttpResponse, HttpResponseRedirect
from django.utils import timezone
from django.shortcuts import render, get_object_or_404
from .models import Persona, Pareja
from django.urls import reverse
from . models import *

# Create your views here.

def listado (request):
    contexto = {
        'parejas': Pareja.objects.all()
    }

    return render(request, 'registroApp/listado.html',contexto)
