import cv2
import numpy
import time

cam = cv2.VideoCapture(0)
detector = cv2.CascadeClassifier('Classifiers/face.xml')
i = 0
offset = 50

# name=raw_input('enter your id')
name = '01670115309'

# Wait for 300 milliseconds
time.sleep(.300)

while True:
    ret, im = cam.read()
    gray = cv2.cvtColor(im,cv2.COLOR_BGR2GRAY)
    faces = detector.detectMultiScale(gray, scaleFactor=1.2, minNeighbors=5, minSize=(100, 100), flags=cv2.CASCADE_SCALE_IMAGE)
    for(x,y,w,h) in faces:
        i=i+1
        cv2.imwrite("dataSet/"+name+'.'+str(i)+".jpg", gray[y-offset:y+h+offset,x-offset:x+w+offset])
        cv2.rectangle(im,(x-50,y-50),(x+w+50,y+h+50),(225,0,0),2)
        cv2.imshow('im',im[y-offset:y+h+offset,x-offset:x+w+offset])
        cv2.waitKey(10)
    if i>=20:
        cam.release()
        cv2.destroyAllWindows()
        break
