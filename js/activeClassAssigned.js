$(document).ready(function () {

    // get the id of the hero section
    var activeID = document.getElementById("activeID").innerHTML;

    // get all the values from the navigation
    var Home = document.querySelector("#Home");
    var About = document.querySelector("#About");
    var Courses = document.querySelector("#Courses");
    var Library = document.querySelector("#Library");
    var Teachers = document.querySelector("#Teachers");
    var Contact = document.querySelector("#Contact");



    switch (activeID) {

        case 'Home':

            activeID == "Home";
            homeAttribute = $(About).attr("class");

            if (homeAttribute !== "") {

                // add class active
                $(Home).addClass("active");

                // remove all the other classes
                $(About).removeClass("active");
                $(Courses).removeClass("active");
                $(Library).removeClass("active");
                $(Teachers).removeClass("active");
                $(Contact).removeClass("active");

            } 

            break;

        case 'About Us':

            activeID == "About Us";
            aboutAttribute = $(About).attr("class");

            if (aboutAttribute !== "") {

                // add class active
                $(About).addClass("active");

                // remove all the other classes
                $(Home).removeClass("active");
                $(Courses).removeClass("active");
                $(Library).removeClass("active");
                $(Teachers).removeClass("active");
                $(Contact).removeClass("active");

            } 

            break;



        case 'Courses':

            activeID == "Courses";
            coursesAttribute = $(Courses).attr("class");

            if (coursesAttribute !== "") {

                // add class active
                $(Courses).addClass("active");

                // remove all the other classes
                $(Home).removeClass("active");
                $(About).removeClass("active");
                $(Library).removeClass("active");
                $(Teachers).removeClass("active");
                $(Contact).removeClass("active");

            } 

            break;



        case 'Library':

            activeID == "Library";
            libraryAttribute = $(About).attr("class");

            if (libraryAttribute !== "") {

                // add class active
                $(Library).addClass("active");

                // remove all the other classes
                $(Home).removeClass("active");
                $(About).removeClass("active");
                $(Courses).removeClass("active");
                $(Teachers).removeClass("active");
                $(Contact).removeClass("active");


            }

            break;



        case 'Teachers':

            activeID == "Teachers";
            teachersAttribute = $(About).attr("class");

            console.log(teachersAttribute);

            if (teachersAttribute !== "") {

                // add class active
                $(Teachers).addClass("active");

                // remove all the other classes
                $(Home).removeClass("active");
                $(About).removeClass("active");
                $(Courses).removeClass("active");
                $(Library).removeClass("active");
                $(Contact).removeClass("active");


            } 

            break;


        case 'Contact':

            activeID == "Contact";
            contactAttribute = $(About).attr("class");

            if (contactAttribute !== "") {

                // add class active
                $(Contact).addClass("active");

                // remove all the other classes
                $(Home).removeClass("active");
                $(About).removeClass("active");
                $(Courses).removeClass("active");
                $(Library).removeClass("active");
                $(Teachers).removeClass("active");

            } 

            break;


        default:
            console.log("there is some Error");
            break;
    }



});






