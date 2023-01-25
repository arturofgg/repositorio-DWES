#Escriba un programa que pida el peso (en kilogramos) y la altura (en metros) de una persona y que calcule su índice de masa corporal (imc).
#Se recuerda que el imc se calcula con la fórmula imc = peso / altura 2

peso = float(input("Escriba el peso en kg"))
altura= float(input("Escriba su altura en metros"))

imc = peso/altura**2
print(f"Su imc es de {imc:.2f}")

if imc>25:
    print(f"Usted esta gordete")
elif imc<20:
    print(f"Usted esta flaquete")
else:
    print(f"Esta sanete")
