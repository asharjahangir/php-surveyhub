# PHP SurveyHub
A platform where you can build your own surveys as well as browser other people's surveys.
## Get Started
No fancy plugin or framework is necassary. Just setup an environment for PHP web development and deploy.
## How does it work?
There are 5 pages:
* Home
* Login
* Sign up
* Build
* Browse (and pages for each survey)
### Home
![image](https://github.com/user-attachments/assets/6c173480-c0f0-4b2b-8c11-08cad04f23c5)
On the homepage, you will be able to see the header on the top with Login and Sign up and in the main body you can see the Build and Browse buttons. If the database is integrated, any actions performed by the user will take the user to the login screen if they aren't logged in already and if they are logged in, in that case the user will be able to go to the pages respectively.
### Login & Sign up
![image](https://github.com/user-attachments/assets/75a1ef71-a574-41fd-b0e0-a6deac0c71ad)
![image](https://github.com/user-attachments/assets/b4a3ac29-ad85-4ac7-b69b-abcd4e653ddf)
Both Login and Sign up pages are similar and basic which can be easily expanded upon. Their logic is contained in the process php files of the pages respectively which include the password requirement checks and insertion of user data into the database.
### Build
![image](https://github.com/user-attachments/assets/53a0d152-d3aa-4e6a-a403-408f4c05b93d)
This is a very basic survey builder, there are a few necassary text fields such as the title. The way questions input work is that you can input the question and however amount of options you want, and if you don't input any options the program automatically determines that question to be an "open-ended" question which will give it a text input field when the survey is published. The data is inserted to the database, the mySQL commands may differ depending on your table in the database.
### Browse
![image](https://github.com/user-attachments/assets/e4a98ecd-591c-4c11-96ed-74aec02fc516)
A simple browse page, this retrieves the surveys from the database and displays them and the user that created the survey, users can find the survey they want and fill it in. Displaying survey features was an idea being worked on therefore you will be able to find the chart-script and the results files too however those are not integrated into the system.
## License
This project is licensed under the MIT License - see the [LICENSE](https://github.com/asharjahangir/surveyhub/blob/main/LICENSE) file for details.
## Supplementary information
This project is not being actively developed. It was created in a short timespan therefore lacks certain features.
