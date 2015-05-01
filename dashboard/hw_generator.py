import sys
import difflib
import random

#retrieve passed arguments
password = str(sys.argv[1])
num = int(sys.argv[2])

#initialise arrays
array1 = []
array2 = []
array3 = []
array4 = []
array5 = []

#declare compare function to separate words acc. to their matching ratio 
def compare(ratio):
	if ratio >= 0.75:
		array1.append(line.rstrip())
	elif ratio >= 0.50:
		array2.append(line.rstrip())
	elif ratio >= 0.25:
		array3.append(line.rstrip())
	else:
		array4.append(line.rstrip())

#Open file containing password
with open(sys.argv[3], "r", encoding="utf8", errors='ignore') as f:

	#check if you have reached required number of words in array
	for line in f:
		if len(array1)+len(array2)+len(array3)==num:
			break
		else:
			ratio = difflib.SequenceMatcher(None,password,line).ratio()
			compare(ratio)


#print("Array 1: More than 75%")
#print(len(array1))
if len(array1)<=num:
	print(' '.join(map(str, array1)))
else:
	n1= num
	for n1 in array1:
		random.choice(array1)
		break
	
#print("Array 2: More than 50%")
#print(len(array2))
if len(array1) + len(array2)<=num:
	print(' '.join(map(str, array2)))
else:
	n2=num - len(array1)
	for n2 in array2:
		random.choice(array2)
		break

#print("Array 3: More than 25%")
#print(len(array3))
if len(array3)+len(array2)+len(array1)<=num:
	print(' '.join(map(str, array3)))
else:
	n3=num - len(array1) - len(array2)
	for n3 in array3:
		random.choice(array3)
		break

#print("Array 4:")
if len(array4)+len(array3)+len(array2)+len(array1)<=num:
	 print(' '.join(map(str, array4)))
else:
	if len(array1)+len(array2)+len(array3)!= num:
		n4=num - len(array1) - len(array2) - len(array3)
		print(n4)
		l=len(array4)
		for i in range(0, n4):
			n = random.randrange(l)
			array5.append(array4[n])
		print(array5)
		print(array4)