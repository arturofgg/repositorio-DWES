from django.http import HttpResponse, HttpResponseRedirect
from django.utils import timezone
from django.shortcuts import render, get_object_or_404
from django.urls import reverse
from . models import *


# Create your views here.


def prueba(request):

    return HttpResponse("Estas en el apartado de incidencias.")


def listado (request):
    contexto = {
        'estaciones': Estaciones.objects.all()
    }

    return render(request, 'incidencias/listado.html',contexto)



def nueva(request, estaciones_id):
    estacion = get_object_or_404(Estaciones, pk=estaciones_id)

    if request.method == 'POST':
        tipo_incidencia = request.POST.get('tipo_incidencia', False)

        if tipo_incidencia:
            incidencia = Incidencia(nombre=tipo_incidencia, fecha=timezone.now(), estacion=Estaciones.objects.get(pk=estaciones_id))
            incidencia.save()

            return HttpResponseRedirect(reverse('incidencias:correcto'))
    else:
        return render(request, 'incidencias/nueva.html', {'estacion': estacion})

    return render(request, 'incidencias/nueva.html', {'estacion': estacion, 'error': 'El campo está vacío'})






def exito(request):
    contexto = {
        'estaciones': Estaciones.objects.all(),
        'mensaje_exito': 'Su incidencia ha sido dada de alta'
    }

    return render(request, 'incidencias/exito.html', contexto)


