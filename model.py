# preprocessing
# convert an image array to new color space
from skimage.color import rgb2gray
import numpy as np
import cv2
import matplotlib.pyplot as plt
# %matplotlib inline
from scipy import ndimage

image = plt.imread('b.jpg')
image.shape
plt.imshow(image)

# convert colour image into grayscale image
gray = rgb2gray(image)
plt.imshow(gray, cmap='gray')

gray.shape

from PIL import Image
import pytesseract

pytesseract.pytesseract.tesseract_cmd = r'C:\Program Files\Tesseract-OCR\tesseract.exe'
file = Image.open("b.jpg")
answer = pytesseract.image_to_string(file, lang='eng')

print(answer)

import re
import nltk
import csv
import pandas as pd
from nltk.corpus import stopwords
from nltk.stem.porter import PorterStemmer
from nltk.stem import WordNetLemmatizer

# Tokenizing sentences
sentences = nltk.sent_tokenize(answer)

# Tokenizing words
words = nltk.word_tokenize(answer)

# Stemming
ps = PorterStemmer()
# Lematization
wordnet = WordNetLemmatizer()

print(words)

length_of_answer = len(words)

print(length_of_answer)

corpus = []
for i in range(len(words)):
    review = re.sub('[^a-zA-Z]', ' ', words[i])
    review = review.lower()
    review = review.split()
    review = [wordnet.lemmatize(word) for word in review if not word in set(stopwords.words('english'))]
    review = ' '.join(review)
    corpus.append(review)

print(corpus)

corpus = list(filter(None, corpus))
print(corpus)

keywords = []
n = int(input("Enter number of keywords : "))

# iterating till the range
for i in range(0, n):
    ele = input()

    keywords.append(ele)  # adding the element

print(keywords)

from collections import Counter

# count word occurrences
a_vals = Counter(corpus)
b_vals = Counter(keywords)

# convert to word-vectors
words = list(a_vals.keys() | b_vals.keys())
a_vect = [a_vals.get(word, 0) for word in words]  # [0, 0, 1, 1, 2, 1]
b_vect = [b_vals.get(word, 0) for word in words]  # [1, 1, 1, 0, 1, 0]

# find cosine-similarity
len_a = sum(av * av for av in a_vect) ** 0.5  # sqrt(7)
len_b = sum(bv * bv for bv in b_vect) ** 0.5  # sqrt(4)
dot = sum(av * bv for av, bv in zip(a_vect, b_vect))  # 3
cosine = dot / (len_a * len_b)

print(cosine)

cosine = cosine * 100
print(cosine)

length_of_the_answer_by_moderator = int(input())
print(length_of_the_answer_by_moderator)

if length_of_answer >= length_of_the_answer_by_moderator:
    if (100 > cosine > 90):
        print("Marks = 10")
    elif (89.99 > cosine > 80):
        print("Marks = 9")
    elif (79.99 > cosine > 70):
        print("Marks = 8")
    elif (69.99 > cosine > 60):
        print("Marks = 7")
    elif (59.99 > cosine > 50):
        print("Marks = 6")
    elif (49.99 > cosine > 40):
        print("Marks = 5")
    elif (39.99 > cosine > 30):
        print("Marks = 4")
    elif (29.99 > cosine > 20):
        print("Marks = 3")
    elif (19.99 > cosine > 10):
        print("Marks = 2")
    elif (9.99 > cosine > 1):
        print("Marks = 1")
    else:
        print("Marks = 0")
else:
    if (100 > cosine > 80):
        print("Marks = 4")
    elif (79.99 > cosine > 60):
        print("Marks = 3")
    elif (59.99 > cosine > 40):
        print("Marks = 2")
    elif (39.99 > cosine > 20):
        print("Marks = 1")
    else:
        print("Marks = 0")

