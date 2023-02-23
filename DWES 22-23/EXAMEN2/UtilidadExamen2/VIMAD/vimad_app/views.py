from django.shortcuts import get_object_or_404, render
from django.http import HttpResponse, Http404, HttpResponseRedirect
from .models import Estudio, Actor, Director, Corto, Question, Choice
from django.template import loader
from django.urls import reverse
from django.views import generic

# Create your views here.

"""
    PRIMERA VISTA CREADA (TUTO 1)
        def index(request):
            return HttpResponse("INDICE")
"""

def lista_estudios(request):
    lista_estudios_porfecha = Estudio.objects.order_by('-fec_fundacion')[:5]
    context = {'lista_estudios_porfecha': lista_estudios_porfecha}
    return render(request, 'vimad_app/lista_estudios.html', context)

def detalle_estudio(request, estudio_nombre):
    return HttpResponse("Este es el estudio %s." % estudio_nombre)

def detalle_actor(request, actor_nombre):
    response = "Este es el actor %s."
    return HttpResponse(response % actor_nombre)

def detalle_director(request, director_nombre):
    return HttpResponse("Este es el director %s." % director_nombre)

#LISTADO QUE POR LA ID DEL CORTO, TE DICE EL TITULO, LOS DIRECTORES, ACTORES Y ESTUDIOS
def listado_corto(request, corto_id):
    corto = get_object_or_404(Corto, pk=corto_id)
    directores = corto.dirige.all()
    actores = corto.actua.all()
    estudios = corto.produce.all()
    return render(request, 'vimad_app/listado_corto.html', {'corto': corto, 'directores': directores, 'actores' : actores, 'estudios' : estudios})


#VISTAS DE QUESTION Y CHOICE
#VISTAS MODIFICADAS PARA AHORRAR CODIGO

class IndexView(generic.ListView):
    template_name = 'vimad_app/index.html'
    context_object_name = 'latest_question_list'

    def get_queryset(self):
        """Return the last five published questions."""
        return Question.objects.order_by('-pub_date')[:5]
    

class DetailView(generic.DetailView):
    model = Question
    template_name = 'vimad_app/detail.html'


class ResultsView(generic.DetailView):
    model = Question
    template_name = 'vimad_app/results.html'

def vote(request, question_id):
    question = get_object_or_404(Question, pk=question_id)
    try:
        selected_choice = question.choice_set.get(pk=request.POST['choice'])
    except (KeyError, Choice.DoesNotExist):
        return render(request, 'vimad_app/detail.html', {
            'question': question,
            'error_message': "Selecciona una opcion",
        })
    else:
        selected_choice.votes += 1
        selected_choice.save()
        return HttpResponseRedirect(reverse('vimad:results', args=(question.id,)))



"""  
VISTA ANTIGUA DE VOTOS
def votos(request, estudio_id):
return HttpResponse("ESTUDIO: %s" % estudio_id) 
"""

""" 
def detalle_corto(request, corto_titulo):
    return HttpResponse("Este es el corto %s." % corto_titulo) 
"""

"""
ESTA ES UNA VISTA AVANZADA (TUTO2) PERO CON LOS TEMPLATES SE QUUEDA FUERA
    def lista_estudios(request):
        Lista_estudios_porfecha = Estudio.objects.order_by('fec_fundacion')[:5]
        output = ', '.join([q.nombre for q in lista_estudios_porfecha])
        base = ("La lista de estudios es la siguiente: " + output)
        return HttpResponse(base)
"""

""" 
AQUI PILLO EL TEMPLATE, PERO CON HTTPRESPONSE EN VEZ DE CON RENDER. (TUTO3)
    def index(request):
        lista_estudios_porfecha = Estudio.objects.order_by('-fec_fundacion')[:5]
        template = loader.get_template('vimad_app/lista_estudios.html')
        context = {
            'lista_estudios_porfecha': lista_estudios_porfecha,
        }
        return HttpResponse(template.render(context, request)) 
"""

""" 
VISTA QUE SI NO HAY ESTUDIO TE SALTA UN ERROR
    def estudio_conerrores(request, estudio_id):
        try:
            estudio = Estudio.objects.get(pk=estudio_id)
        except Estudio.DoesNotExist:
            raise Http404("El estudio no existe")
        return render(request, 'vimad_app/detalle.html', {'estudio': estudio})
"""