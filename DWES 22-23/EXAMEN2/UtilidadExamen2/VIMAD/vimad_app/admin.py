from django.contrib import admin
from .models import Estudio, Director, Actor, Corto, Question, Choice

#te muestra en questions, 3 choices a rellenar
class ChoiceInline(admin.StackedInline): #TabularInline
    model = Choice
    extra = 3

#te muestra el question_text y collapse te esconde la date information
class QuestionAdmin(admin.ModelAdmin):
    fieldsets = [
        (None,               {'fields': ['question_text']}),
        ('Date information', {'fields': ['pub_date'], 'classes': ['collapse']}),
    ]
    inlines = [ChoiceInline]


# Register your models here.
admin.site.register(Estudio)
admin.site.register(Director)
admin.site.register(Actor)
admin.site.register(Corto)
admin.site.register(Question, QuestionAdmin)
admin.site.register(Choice)


""" class QuestionAdmin(admin.ModelAdmin):
    #CAMBIA EL ORDEN DE LOS ATRIBUTOS
    fields = ['pub_date', 'question_text'] """

""" class QuestionAdmin(admin.ModelAdmin):
    fieldsets = [
        (None,               {'fields': ['question_text']}),
        ('Informacion de la fecha', {'fields': ['pub_date']}),
    ] """
