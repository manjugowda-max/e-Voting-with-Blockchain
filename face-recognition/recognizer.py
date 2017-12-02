import cv2, json, sys
import numpy as np

faceDetect = cv2.CascadeClassifier('C:\\xampp\\htdocs\\e-voting-with-blockchain\\face-recognition\\haarcascade_frontalface_default.xml')
cam = cv2.VideoCapture(0)

recognizer = cv2.createLBPHFaceRecognizer()
recognizer.load('C:\\xampp\\htdocs\\e-voting-with-blockchain\\face-recognition\\training_data.yml')

font = cv2.cv.InitFont(cv2.cv.CV_FONT_HERSHEY_COMPLEX_SMALL, 3, 1, 0, 2)

Id = int(sys.argv[1])
# Id = '123456789'
Id = int(Id)

i = 1
result = 0

while (True):
    ret, img = cam.read()
    if ret is True:
        grayImg = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

        faces = faceDetect.detectMultiScale(grayImg, 1.3, 5)
        for (x, y, w, h) in faces:
            userId, conf = recognizer.predict(grayImg[y : y + h, x : x + w])
            cv2.rectangle(img, (x, y), (x + w, y + h), (0, 255, 0), 2)
        
            userId = int(userId)
            conf = float(str(conf))

            # print "User Id: ", userId
            # print "Id: ", Id

            if(Id == userId):
                result = 1
                break
            else:
                result = 0
            # print("step: ", i ," result: ", result)
            i += 1
            cv2.waitKey(300)
        
        # cv2.imshow("Camera", img)

        if(i > 10):
            break
        if (cv2.waitKey(1) == ord('q')):
            break
    if (result == 1):
        break;

cam.release()
cv2.destroyAllWindows()

if (result == 1):
    result = str(result)
    result = "yes"
else:
    result = str(result)
    result = "no"

# result = json.dumps(result)
# result = str(result)
print result
