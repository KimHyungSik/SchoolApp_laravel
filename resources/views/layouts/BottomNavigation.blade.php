<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0"
        />
        <link rel="stylesheet" type="text/css" href="css/Community.css" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
        />
        <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"
        ></script>
        <script src="js/community.js"></script>
        <title>Community</title>
    </head>
    <body>
        @yield('content')
        <footer>
            <nav class="Footer_Nav">
                <ul>
                    <li class="on" id="footer-column">
                        <a href="{{route('Calendar')}}"
                            ><i
                                class="far fa-calendar-alt"
                                style="font-size: 26px"
                            ></i
                        ></a>
                    </li>
                    <li id="footer-column">
                        <a href="{{route('SemesterPoint')}}"
                            ><i
                                class="fas fa-chart-line"
                                style="font-size: 26px"
                            ></i
                        ></a>
                    </li>
                    <li id="footer-column">
                        <a href="{{route('MainPage')}}"
                            ><i
                                class="far fa-comment-alt"
                                style="font-size: 26px"
                            ></i
                        ></a>
                    </li>
                    <li id="footer-column">
                        <a href="{{route('Job')}}"
                            ><i
                                class="far fa-building"
                                style="font-size: 26px"
                            ></i
                        ></a>
                    </li>
                    <li id="footer-column">
                        <a href="{{route('Preferences')}}"
                            ><i
                                class="fas fa-ellipsis-h"
                                style="font-size: 26px"
                            ></i
                        ></a>
                    </li>
                </ul>
            </nav>
        </footer>
    </body>
</html>
