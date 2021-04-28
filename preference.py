min_height = int(input("Enter your preference min height :"))
max_height = int(input("Enter your preference max height :"))
min_age=int(input("Enter your preference min age :"))
max_age=int(input("Enter your preference max age :"))
min_weight=int(input("Enter your preference min weight :"))
max_weight=int(input("Enter your preference max weight :"))
user_nation1=(input("Enter your prefer nation or nations:"))
user_nation2=(input("Enter your prefer nation or nations:"))
user_religion1=input("Enter your prefer religion or religions:")
user_religion2=input("Enter your prefer religion or religions:")
color_complex=input("Enter your preference color_complex:")
Eye_color=input("Enter your preferance eye color:")
education=input("Enter your preference education level:")
job=input("Enter your preference job type:")
salary=int(input("Enter your prefernce salary range: "))


def match(a, b, c, count1=0):
    if a <= c and c <= b:
        count1 = count1 + 1
    return count1

def match1(user1, user2, n1, count4=0):
    if user1 in n1 or user2 in n1:
        count4 = count4 + 1
    return count4

def match3(color_complex1,color_complex_user1,count6=0):
    if color_complex1 == color_complex_user1:
        count6 = count6 + 1
    return count6

def match4(salary1,salary_user1,count9=0):
    if salary1<=salary_user1:
        count9 = count9 + 1
    return count9

count=0
height = 200
c1 = match(min_height, max_height, height)
count=count+c1


age=20
c2=match(min_age,max_age,age)
count=count+c2


weight=40
c3=match(min_weight,max_weight,weight)
count=count+c3


nation="3"
c4=match1(user_nation1,user_nation2,nation)
count=count+c4


religion="2"
c5=match1(user_religion1,user_religion2,religion)
count=count+c5

color_complex_user="1"
c6=match3(color_complex,color_complex_user)
count=count+c6

Eye_color_user="2"
c7=match3(Eye_color,Eye_color_user)
count=count+c7

education_user="4"
c8=match3(education,education_user)
count=count+c8

job_user="1"
c10=match3(job,job_user)
count=count+c10

salary_user=50000
c9=match4(salary,salary_user)
count=count+c9

percentage=(count/10)
print(percentage)

