import os
import cv2
import numpy as np
from PIL import Image

recognizer = cv2.createLBPHFaceRecognizer()
path = 'C:\\xampp\\htdocs\\e-voting-with-blockchain\\face-recognition\\dataset'

def getImgWithId(path):
    imgPaths = [os.path.join(path, f) for f in os.listdir(path)]
    faces = []
    ids = []

    for imgPath in imgPaths:
        facePilImg = Image.open(imgPath).convert('L')
        faceNpImg = np.array(facePilImg, 'uint8')
        Id = int(os.path.split(imgPath)[-1].split('_')[1])

        faces.append(faceNpImg)
        ids.append(Id)
        # cv2.imshow("training", faceNpImg)
        cv2.waitKey(10)

    return np.array(ids), faces

ids, faces = getImgWithId(path)
recognizer.train(faces, ids)
recognizer.save('C:\\xampp\\htdocs\\e-voting-with-blockchain\\face-recognition\\training_data.yml')

cv2.destroyAllWindows()
