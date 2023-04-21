<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="img/logo.png">
    <link rel="stylesheet" href="style/styles.css">
    <title>Movies Schedule</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="_.js "></script>
</head>

<header></header>

<body>
    <div class="schedule-section">
        <h1>Schedule</h1>
        <div class="schedule-dates">
            <div class="schedule-item">April 13,2023</div>
            <div class="schedule-item ">April 14,2023</div>
            <div class="schedule-item">April 15,2019</div>
            <div class="schedule-item schedule-item-selected">April 16,2019</div>
            <div class="schedule-item">April 17,2019</div>
        </div>
        <div class="schedule-table">
            <table>
                <tr>
                    <th>SHOW</th>
                    <th>SCHEDULE IN THEATRE</th>
                </tr>
                <td>
                    <h2>Avatar: The Way of Water</h2>
                    <img src="img/avatar2.jpg" alt="" width="250" height="150">

                    <i class="far fa-clock"></i> 125m <i class="fas fa-desktop"></i> 3D, 2D
                    <h3>Description</h3>
                    <p>Avatar: The Way of Water is a 2022 American epic science fiction film directed and produced
                        by James Cameron. He co-wrote the screenplay with Rick Jaffa and Amanda Silver from a story
                        the trio wrote with Josh Friedman and Shane Salerno. Distributed by 20th Century Studios, it
                        is the sequel to Avatar (2059) and the second installment in the Avatar film series. Cast
                        members Sam Worthington, Zoe Saldaña, Stephen Lang, Joel David Moore, CCH Pounder, Giovanni
                        Ribisi, Dileep Rao, and Matt Gerald reprise their roles from the original film, with
                        Sigourney Weaver returning in an additional role[6] while Kate Winslet joined the cast. It
                        follows a blue-skinned humanoid Na'vi named Jake Sully (Worthington) as he and his family,
                        under renewed human threat, seek refuge with the aquatic Metkayina clan of Pandora, a
                        habitable exomoon on which they live.</p>
                    <div class="schedule-item"><a href="#" id="details">DETAILS</a></div>
                    <script>
                        document.getElementById("details").addEventListener('click', function () {
                            window.location.href = "index.php"; 
                        });
                    </script>
                </td>

                <td>
                    <div class="hall-type">
                        <h3>Private Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">1:00 PM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                    <div class="hall-type">
                        <h3>VIP Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">1:00 PM</div>
                            <div class="schedule-item">6:00 PM</div>
                        </div>
                    </div>
                    <div class="hall-type">
                        <h3>Main Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">1:00 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                </td>
                </tr>

                <td>
                    <h2>Varisu</h2>
                    <img src="img/210398_thumb_665.jpg" alt="" width="250" height="150">
                    <i class="far fa-clock"></i> 125m <i class="fas fa-desktop"></i> 3D, 2D
                    <h3>Description</h3>
                    <p>Varisu (pronounced [ʋaːɾisɯ] transl. Heir) is a 2023 Indian Tamil-language action drama film
                        directed by Vamshi Paidipally who co-wrote it with Hari and Ashishor Solomon. Produced jointly
                        by Dil Raju and Sirish under the banner of Sri Venkateswara Creations and PVP Cinema, the film
                        stars Vijay and Rashmika Mandanna, with an ensemble cast of R. Sarathkumar, Prabhu, Jayasudha,
                        Prakash Raj, Srikanth, Shaam, Ganesh Venkatraman, Sangeetha Krish, VTV Ganesh, S.J Suryah and
                        Suman in other pivotal roles. It focuses on an entrepreneur's youngest son being named the
                        chairman of his father's business, much to the dismay of his two brothers.
                    </p>
                    <div class="schedule-item"> DETAILS</a>
                    </div>
                </td>
                <td>
                    <div class="hall-type">
                        <h3>Private Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">11:30 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                    <div class="hall-type">
                        <h3>VIP Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">11:30 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                    <div class="hall-type">
                        <h3>Main Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">11:30 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                </td>
                </tr>

                <td>
                    <h2>Jhon Wick : Chapter 4</h2>
                    <img src="img/parabellumcover.0.jpg" alt="" width="250" height="150">
                    <i class="far fa-clock"></i> 125m <i class="fas fa-desktop"></i> 3D, 2D
                    <h3> Description</h3>
                    <p>
                        Kolstad's script drew on his interest in action, revenge, and neo noir films. Titled Scorn,
                        producer Basil Iwanyk purchased the rights as his first independent film production. Reeves, who
                        was experiencing a career lull, liked the script and recommended experienced stunt-and-action
                        choreographers Stahelski and David Leitch to direct the action scenes but the pair successfully
                        lobbied to co-direct the project. Despite being nearly canceled weeks prior to filming,
                        principal photography on the project began on October 7, 2013, on a $20–$30 million budget.
                        Stahelski and Leitch focused on highly-choreographed, long, single takes to convey action,
                        eschewing the rapid cuts and closeup shots of contemporary action films. Iwanyk struggled to
                        secure theatrical distributors because industry executives were dismissive of an action film by
                        first-time directors, and Reeves's recent films had underperformed. Lionsgate Films eventually
                        purchased the distribution rights and a release date was scheduled for October 24, 2014.
                    </p>
                    <div class="schedule-item"> DETAILS</a>
                    </div>
                </td>
                <td>
                    <div class="hall-type">
                        <h3>Private Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">11:30 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                    <div class="hall-type">
                        <h3>VIP Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">11:30 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                    <div class="hall-type">
                        <h3>Main Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">11:30 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                </td>
                </tr>

                <td>
                    <h2>Jung_E</h2>
                    <img src="img/jung-e-2.jpg" alt="" width="250" height="150">
                    <i class="far fa-clock"></i> 125m <i class="fas fa-desktop"></i> 3D, 2D
                    <h3> Description</h3>
                    <p>Jung_E portrays a desolated Earth in the 22nd century that is no longer habitable due to climate
                        change, and humans are forced to live in man-made shelters built in space. As the humans settle
                        in around 80 of those shelters, three of them declare themselves as the Adrian Republic, attack
                        Earth and other shelters, and cause a civil war between the Allied Force and Adrian Republic.

                        Captain Yun Jung-yi is a legendary mercenary of Allied Forces who led her team to countless
                        successful missions against the Adrian Republic. She has a little daughter, Yun Seo-hyun, who
                        suffers from a lung tumor, and Jung-yi became a mercenary to afford her daughter's medical
                        treatments. The day Seo-hyun gets the surgery, Jung-yi fails her mission and ends up in a coma.
                        Kronoid, an institute in charge of developing AI technologies, convinces her family to agree to
                        clone her brain, promising that they will cover Jung-yi's treatments, her daughter's education
                        and living expenses.
                    </p>
                    <div class="schedule-item"> DETAILS</a>
                    </div>
                </td>
                <td>
                    <div class="hall-type">
                        <h3>Private Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">11:30 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                    <div class="hall-type">
                        <h3>VIP Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">11:30 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                    <div class="hall-type">
                        <h3>Main Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">11:30 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                </td>
                </tr>

                <td>
                    <h2>The Gray Man</h2>
                    <img src="img/p21562309_v_h8_aa.jpg" alt="" width="250" height="150">
                    <i class="far fa-clock"></i> 125m <i class="fas fa-desktop"></i> 3D, 2D
                    <h3> Description</h3>
                    <p>The Gray Man is a 2022 American action thriller film directed by Anthony and Joe Russo, from a
                        screenplay the latter co-wrote with Christopher Markus and Stephen McFeely, based on the 2059
                        novel of the same name by Mark Greaney. The film stars Ryan Gosling, Chris Evans, Ana de Armas,
                        Jessica Henwick, Regé-Jean Page, Wagner Moura, Julia Butters, Dhanush, Alfre Woodard, and Billy
                        Bob Thornton. Produced by the Russo brothers' company, AGBO, it is the first film in a franchise
                        based upon Greaney's Gray Man novels. The plot centers on CIA agent "Sierra Six", who is on the
                        run from sociopathic ex-CIA agent and mercenary Lloyd Hansen upon discovering corrupt secrets
                        about his superior.

                        An adaptation of Greaney's novel was originally announced in 2011, with James Gray set to direct
                        Brad Pitt, and later Charlize Theron in a gender-swapped role, though neither version ever came
                        to fruition. The property lingered in development hell until July 2020, when it was announced
                        the Russo brothers would direct, with both Gosling and Evans attached to star. Filming took
                        place in Los Angeles, Paris and Prague between March and July 2021. With a production budget of
                        $205 million, it is among the most expensive films made by Netflix.
                    </p>
                    <div class="schedule-item"> DETAILS</a>
                    </div>
                </td>
                <td>
                    <div class="hall-type">
                        <h3>Private Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">11:30 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                    <div class="hall-type">
                        <h3>VIP Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">11:30 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                    <div class="hall-type">
                        <h3>Main Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">11:30 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                </td>
                </tr>

                <td>
                    <h2>Pathaan</h2>
                    <img src="img/maxresdefault (3).jpg" alt="" width="250" height="150">
                    <i class="far fa-clock"></i> 125m <i class="fas fa-desktop"></i> 3D, 2D
                    <h3> Description</h3>
                    <p>Pathaan (pronounced [pəʈʰaːn]) is a 2023 Indian Hindi-language action thriller film directed by
                        Siddharth Anand and written by Shridhar Raghavan and Abbas Tyrewala, from a story by Anand. The
                        fourth installment in the YRF Spy Universe, it stars Shah Rukh Khan, Deepika Padukone, John
                        Abraham, Dimple Kapadia, and Ashutosh Rana. In the film, Pathaan (Khan), an exiled RAW agent,
                        works with ISI agent Rubina Mohsin (Padukone) to take down Jim (Abraham), a former RAW agent
                        planning to spread a deadly lab-generated virus across India. Produced by Aditya Chopra of Yash
                        Raj Films,[5] Pathaan began principal photography in November
                        2020 in Mumbai. The film was shot over various locations in India, Afghanistan, Spain, UAE,
                        Turkey, Russia, Italy and France. Two songs were composed by the duo Vishal–Shekhar, while
                        Sanchit Balhara and Ankit Balhara provided the score. The film was made on an estimated
                        production budget of ₹225 crore (US$28 million) with a further ₹15 crore (US$1.9 million) spent
                        on print and advertising.[3] Against the norm, pre-release publicity was limited with no media
                        interaction or public events.
                    </p>
                    <div class="schedule-item"> DETAILS</a>
                    </div>
                </td>
                <td>
                    <div class="hall-type">
                        <h3>Private Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">11:30 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                    <div class="hall-type">
                        <h3>VIP Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">11:30 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                    <div class="hall-type">
                        <h3>Main Hall</h3>
                        <div>
                            <div class="schedule-item"><i class="far fa-clock"></i></div>
                            <div class="schedule-item">09:00 AM</div>
                            <div class="schedule-item">11:30 AM</div>
                            <div class="schedule-item">06:00 PM</div>
                        </div>
                    </div>
                </td>
                </tr>
            </table>
        </div>


    </div>
    <footer></footer>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/owl.carousel.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>