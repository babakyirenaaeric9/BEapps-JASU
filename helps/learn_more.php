<?php
session_start();

include ("../active/database.php");
include ("../active/function.php");

$user_data = check_login($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learn more</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../active/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top px-5" >
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                WELCOME: <span id="username"><?php echo $user_data['surname'] ." ". $user_data['middlename']. " " . $user_data['lastname']; ?></span>, 
                <span id="usertype">User Type: <?php echo $user_data['usertype']; ?></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../helps/learn_more.php">Learn More</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../helps/contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../profile/profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="https://stu.edu.gh/">STU Portal</a></li>
                            <li><a class="dropdown-item" href="../active/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="wrapper">
        <center>
            <img src="../images/stu_jasu.png" alt="LOGO" style="width: 150px;">
            <h1>SUNYANI TECHNICAL UNIVERSITY</h1>
            <h2>JIRAPA AREA STUDENTS UNION (JASU)</h2>
            
        </center>
            
            <hr>

            <div class="abt_us">
                    <center>
                        <h1>About the Scholarship</h1>
                    </center>
                

                    <p>
                        The JASU SCHOLARSHIP is designed to support talented and dedicated students who demonstrate academic excellence, leadership potential, and a commitment to the Jirapa Area Students community service. Our goal is to empower future leaders by helping them achieve their educational and career aspirations, regardless of financial limitations.
                    </p>

                    <center>
                        <h2>Scholarship Benefits</h2>
                    </center>
                    <ol>
                        <li>
                            <b>Tuition Coverage:</b> The scholarship covers 100% of tuition fees for the entire duration of your study.
                        </li>
                        <li> 
                            <b>Monthly Stipend:</b> Scholars receive a monthly allowance for living expenses, including accommodation, books, and personal needs.
                        </li>
                        <li>
                            <b>Mentorship Program:</b> Each scholar is paired with an experienced mentor to guide them in their academic journey and career path.
                        </li>

                        <li>
                            <b>Networking Opportunities:</b> Scholars will have access to exclusive events and networking sessions with industry leaders and alumni.
                        </li>
                    </ol>
                    <center>
                        <h2>Eligibility Criteria</h2>
                    </center>

                    <p>To be considered for the JASU SCHOLARSHIP, applicants must meet the following requirements:</p>

                    <ol>
                        <li>
                            <b>Academic Excellence:</b> Must have a minimum GPA of <b>2.50</b> or equivalent in your most recent academic year.
                        </li>
                        <li>
                            <b>Enrollment Status:</b> Applicants must be enrolled or have received an offer to study at a recognized institution.
                        </li>
                        <li>
                            <b>Leadership Potential:</b> Demonstrated involvement in extracurricular activities, leadership roles, or community service initiatives.
                        </li>
                        <li>
                            <b>Financial Need:</b> Proof of financial need is required for this scholarship. Documentation may include income statements or a letter from a financial aid office.
                        </li>
                        <li>
                            <b>Nationality:</b> Open to <b>Only</b> Jirapa Area students and studying in Sunyani Technical University.
                        </li>
                        <li>
                            <b>Age Requirement:</b> Applicants must be between the ages of <b>12</b> and <b>30</b>.
                        </li>
                    </ol>
                    <center>
                        <h2>How to Apply</h2>
                    </center>

                    <p>Applying for the <b>JASU SCHOLARSHIP</b> is a straightforward process. Simply follow the steps below:</p>

                    <ol>
                        <li>
                            <b>Complete the Online Application Form:</b> Fill out all required personal, academic, and financial information.
                        </li>
                        <li>
                            <b>Submit Supporting Documents:</b>
                            <ul>
                                <li>
                                    A copy of your academic transcripts
                                </li>
                                <li>
                                    Proof of enrollment or admission offer
                                </li>
                                <li>
                                    A recommendation letter from a teacher, professor, or mentor
                                </li>
                                <li>
                                    A personal statement or essay (500 words) explaining why you deserve the scholarship and how it aligns with your future goals
                                </li>
                                <li>
                                    Financial documentation (if applicable)
                                </li>
                            </ul>
                            
                        </li>
                        <li>
                            <b>Application Deadline:</b> Ensure that your application and all supporting documents are submitted by [date]. Late applications will not be considered.
                        </li>
                    </ol>

                    <center>
                        <h2>Selection Process</h2>
                    </center>

                    <p>The selection process is highly competitive and involves multiple stages:</p>
                        <ol>
                            <li>
                                <b>Initial Screening:</b> All applications will be reviewed based on eligibility and completeness.
                            </li>
                            <li>
                                <b>Shortlisting:</b> Shortlisted candidates will be contacted for interviews or additional assessments.
                            </li>
                            <li>
                                <b>Final Selection:</b> Successful applicants will be notified by [date], and scholarships will be awarded during the [event or announcement date].
                            </li>
                        </ol>

                        <center>
                            <h2>Frequently Asked Questions (FAQ)</h2>
                        </center>

                        <ol>
                            <li>
                                <b>Can I apply for the scholarship if I am already receiving financial aid?</b><br>
                                <b>YES</b>, but applicants must disclose all sources of financial aid during the application process.
                            </li>
                            <li>
                                <b>Can I defer the scholarship if I need to take a gap year?</b><br>
                                Scholarship deferrals are considered on a case-by-case basis. Please contact our office for more information.
                            </li>
                            <li>
                                <b>What happens if my academic performance declines?</b><br>
                                Scholars are required to maintain a minimum GPA of <b>2.5</b> throughout their studies to retain the scholarship.
                            </li>

                        </ol>
                        <center>
                            <h2>Contact Us</h2>

                        </center>
                            <p>For any inquiries or assistance with your application, feel free to contact us:</p>
                                <ol>
                                    <li>
                                        <b>Email:</b> [jasustuchapter@gmail.com]
                                    </li>
                                    <li>
                                        <b>Phone:</b> [+233-55-600-1865]
                                    </li>
                                    <li> <b>Address:</b> [Sunyani Technical University, Jirapa Area Students Union, Sunyani, ghana]</li>
                                
                                </ol>

                                    <p>
                                        This page serves as a comprehensive guide to help applicants understand the benefits, eligibility, and application process of the scholarship. It encourages qualified students to apply and answers key questions that may arise during the application process.
                                    </p>

            </div>
            <center>
                <a href="../index.php"><button class="btn">HOME</button></a>
            </center>

            <br>
                <br>
                <br>
                <hr>



    </div>
         <footer>
                This website is designed by Babakyirenaa Eric <img src="../images/pass.jpg" alt="passport of me" width="50px">
            </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>