	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='shortcut icon' href='/images/fpicn.ico'/>
    <link rel='stylesheet' type='text/css' href='/css/fpstyle.css' media='screen'/>
    <script src='/js/jquery.min.js'></script>
    <script src='/js/jquery.dotdotdot.js'></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit"></script>

    <style type="text/css">
        td.links {
            border-collapse: collapse;
            font-size:x-small;
            color:gray;
        }
        .suggest {
            font-style:italic;
            font-size:75%;
        }
        .suggest, .inline {
            text-decoration: underline;
            cursor:pointer;
        }
        .errors {
            color: red;
            font-size: larger;
            font-weight: bold;
        }
        .authorpic {
            float: left;
            width: 8em;
            height: auto;
            margin-right: .5em;
            margin-left: 2em;
        }
        .bio p, a.more, a.less {
            margin-left: 2em;
        }
        .bio {
            margin-bottom: 1em;
        }
        .widecell {
            min-width: 160px;
        }
        .widecell p {
            margin: 0;
        }
        .widecell p+p {
            margin-top: .3em;
            margin-bottom: 0;
        }
        .scrollable {
            padding: 2px;
            max-height: 300px;
            overflow: auto;
        }
        #errata tr:nth-child(even) {
            background-color: #F4F4F8;
        }
        #errata tr:nth-child(odd) {
            background-color: #EFF1F1;
        }
        #errata {
            background: slategrey;
            border-style: solid;
            margin-left:2em;
        }
        .next {
            display:inline-block;
            font-size:xx-small;
            border-spacing:0;
        }
        .inactive {
            pointer-events: none;
            cursor: default;
            text-decoration: none;
            color: grey;
        }
        .firstlast a {
            text-decoration:none;
            font-size:x-large;
            line-height:50%;
        }
        .arrow {
            font-size:larger;
            padding-top:0px;
            padding-bottom:0px;
        }
    </style>
    <script type="text/javascript">

    var CaptchaCallback = function() {
        var widgetId1;
        var widgetId2;
        widgetId1 = grecaptcha.render('recaptchaDescription',
            {
                'sitekey' : '6LcuEbUaAAAAAAQr9gsBHFWdpEsPTVAyh7FxkkJ8',
                'callback' : correctCaptcha_Description
            }
        );
        widgetId2 = grecaptcha.render('recaptchaError',
            {
                'sitekey' : '6LcuEbUaAAAAAAQr9gsBHFWdpEsPTVAyh7FxkkJ8',
                'callback' : correctCaptcha_Error
            }
        );
    };
    var correctCaptcha_Description = function(response) {
        $("#desc_hiddenRecaptcha").val(response);
        document.getElementById("desc_hiddenRecaptcha").value = response;
    };
    var correctCaptcha_Error = function(response) {
        $("#err_hiddenRecaptcha").val(response);
        document.getElementById("err_hiddenRecaptcha").value = response;
    };

    function submitErrorForm() {
        $.ajax({
                type:'POST',
                url:'detailerror.php',
                data:$('#ErrorForm').serialize(),
                success: function(response) {
                    $('#error_result').html(response);
                    $('#errors').hide();
                    $('#message').val('');
                }
            }
        );
        return false;
    }

    function submitSuggestForm() {
        $.ajax({
                type:'POST',
                url:'suggestion.php',
                data:$('#SuggestForm').serialize(),
                success: function(response) {
                    $('#suggest_result').html(response);
                    $('#suggest_box').hide();
                }
            }
        );
        return false;
    }

    function submitKindleForm() {
        $.ajax({
                type:'POST',
                url:'kindle-email.php',
                data:$('#KindleForm').serialize(),
                success: function(response) {
                    $('#kindle_result').html(response);
                }
            }
        );
        return false;
    }

    $(document).ready(
        function() {
            $('#showerror').click(
                function() {
                    $('#error_result').html('');
                    $('#errors').show();
                }
            )
        }
    );

    $(document).ready(
        function() {
            $('.suggest').click(
                function() {
                    $('#suggest_result').html('');
                    $('#suggest_box').show();
                }
            )
        }
    );

    $(document).ready(
        function() {
            $(".more").dotdotdot(dotdotdotDefaults);

            // For anything that got truncated, install a more/less handler
            // to toggle full visibility.
            $(".more").each(
                function() {
                    if ($(this).triggerHandler("isTruncated")) {
                        $(this).after($("<a href='' class='more'>" + dotdotdotMore + "</a>")
                            .on('click', (function(_this) {
                                return function(event) {
                                    return toggle(_this, this);
                                };
                            })(this)));
                    }
                }
            );

        }
    );

    function toggle(theDiv, theHref) {
        if ($(theHref).hasClass("more")) {
            $(theDiv).trigger('destroy.dot');
            $(theHref).removeClass("more");
            $(theHref).addClass("less");
            $(theHref).html("<a href=''>" + dotdotdotLess + "</a>");
        } else {
            $(theDiv).dotdotdot(dotdotdotDefaults);
            $(theHref).html("<a href=''>" + dotdotdotMore + "</a>");
            $(theHref).removeClass("less");
            $(theHref).addClass("more");
        }

        return false;
    }

    dotdotdotDefaults = {
        'height': 160,
        'tolerance': 10,
        'watch' : 'window',     // Watches for resizes and changes text in more
    };

    dotdotdotMore = "show more";
    dotdotdotLess = "show less";
    </script>

<meta name='description' content='This, Powys&#039;s fourth novel, was his first literary success. It is a bildungsroman in which the eponymous protagonist, a thirty-five-year-old history teacher, returns to his birthplace, where he discovers the inadequacy of his dualistic philosophy. Wolf resembles John Cowper Powys in that an elemental philosophy is at the centre of his life and, because, like Powys, he hates science and modern inventions like cars and planes, and is attracted to slender, androgynous women. Wolf Solent is the first of Powys&#039;s four Wessex novels. Powys both wrote about the same region as Thomas Hardy and was a twentieth-century successor to the great nineteenth-century novelist.&mdash;Wikipedia'>
<title>Wolf Solent Volume 2</title>

</head>

<body>
    <div class='gradientTop'>
  <table width='100%'>
      <tr>
        <td align='center'>
            <p style='margin-top:0; margin-bottom:0; font-size:1.4em;'><a style='color: gray; text-decoration: none;' href='/index.php'>fadedpage.com</a></p>
        </td>
      </tr>
    </table>
      <table style='width:100%; margin-right: 10px; margin-left:10px;'><tr><td><p>FP now includes <a style='font-size:larger; color:red; text-decoration:none;' href='/allbooks.php'>8497</a> eBooks in its collection.</p></td><td><p style='text-align:right; margin-right:20px;'>&nbsp;&nbsp;<a href='/index.php'>main page</a></p></td></tr></table>  
    <hr style='margin:0 auto 0 auto; border:none; border-bottom:1px solid tan; width:100%; clear:both'/>
  </div>

 

    <div class='gradientBox'>

    <h1 class='title'>Wolf Solent Volume 2</h1><div style='float:right'>
                <p style='font-size:x-small; text-align:right;'>
                <a href='books/20250731/cover.jpg'>
                <img style='max-height:300px; padding-left:10px;' src='/books/20250731/cover.jpg' alt='Cover Image'/>
                </a>
                <br/>
                </div><p style='margin-top:1em;'><b>Book Details</b></p><table summary='details' style='margin-left:2em;'><tr><td valign='top'>Title:</td><td valign='top'>Wolf Solent Volume 2</td></tr><tr><td>Author:</td><td><table style='border-spacing:0;'><tr><td><a href="/csearch.php?author=Powys, John Cowper">Powys, John Cowper</a></td><td>&nbsp;&nbsp;&nbsp;<table class='next'><tr><td>(2 of 2 for author by title)</td><td class='firstlast' style='padding-left: 2em;'><a href="/showbook.php?pid=20250719" title="first">&#8676;</a></td><td><table class='next'><tr><td class='arrow'>&larr;</td><td><a href="/showbook.php?pid=20250719">Wolf Solent Volume 1 (Wessex #1)</a></td></tr></table></td><td class='firstlast'><a class='inactive'>&#8677;</a></td></tr></table></td></tr></table></td></tr><tr><td valign='top'>Published:&#160;&#160;&#160;</td><td valign='top'>1929</td></tr><tr><td valign='top'>Publisher:</td><td valign='top'>Simon and Schuster, Inc.</td></tr><tr><td valign='top'>Tags:</td><td valign='top'><a href="/csearch.php?tags=fiction">fiction</a></td></tr><tr><td valign='top'>Description:</td><td valign='top' class='widecell'><p>This, Powys&#039;s fourth novel, was his first literary success. It is a bildungsroman in which the eponymous protagonist, a thirty-five-year-old history teacher, returns to his birthplace, where he discovers the inadequacy of his dualistic philosophy. Wolf resembles John Cowper Powys in that an elemental philosophy is at the centre of his life and, because, like Powys, he hates science and modern inventions like cars and planes, and is attracted to slender, androgynous women. Wolf Solent is the first of Powys&#039;s four Wessex novels. Powys both wrote about the same region as Thomas Hardy and was a twentieth-century successor to the great nineteenth-century novelist.—Wikipedia <span class='suggest'>[Suggest a different description.]</span></td>        <div id='suggest_box' style='display:none;'>
        <hr style='border-width:2px;'>
        <p>Please enter a suggested description. Limit the size to 1000 characters.
        However, note that many search engines truncate at a much shorter
        size, about 160 characters.
        <p>Your suggestion will be processed as soon as possible.
        <form id="SuggestForm" onsubmit="return submitSuggestForm();">
        <input type="hidden" name="bookid" id="bookid" value="20250731"><br/>
            Description:<br/>
            <textarea rows="5" name="description" id="description" maxlength="1000" cols="80"></textarea><br/>
            <div id='recaptchaDescription' class='g-recaptcha-description' data-sitekey='6LcuEbUaAAAAAAQr9gsBHFWdpEsPTVAyh7FxkkJ8'>
            </div>
            <input type='hidden' class='hiddenRecaptcha' name='desc_hiddenRecaptcha' id='desc_hiddenRecaptcha'>
            <input type="submit" value="Submit" name="SubmitSuggestion"><br/>
        </form>
        <hr style='border-width:2px;'>
        </div>
        <div id="suggest_result"></div>
        </tr>

    <tr><td valign='top'>Downloads:</td><td valign='top'>102</td></tr><tr><td valign='top'>Pages:</td><td valign='top'>317&nbsp;<img src='/images/info.jpg' style='width:3mm;' title='Number of a5 size pages in our pdf format. All 
other formats resize depending on device.' alt='Info'/></td></tr></table><p style='margin-top:1em;clear:left;'><b>Author Bio for Powys, John Cowper</b></p><img class='authorpic' src='author/Powys%2C John Cowper.jpg' alt='Author Image'>
<div class='bio more'><p>John Cowper Powys (1872-1963) was an English novelist, philosopher, lecturer, critic and poet born in Shirley, Derbyshire, where his father was vicar of the parish church in 1871–1879. Powys appeared with a volume of verse in 1896 and a first novel in 1915, but gained success only with his novel Wolf Solent in 1929. He has been seen as a successor to Thomas Hardy, and Wolf Solent, A Glastonbury Romance (1932), Weymouth Sands (1934), and Maiden Castle (1936) have been called his Wessex novels. As with Hardy, landscape is important to his works. So is elemental philosophy in his characters&#039; lives. In 1934 he published an autobiography. His itinerant lectures were a success in England and in 1905–1930 in the United States, where he wrote many of his novels and had several first published. He moved to Dorset, England, in 1934 with a US partner, Phyllis Playter. In 1935 they moved to Corwen, Merionethshire, Wales, where he set two novels, and in 1955 to Blaenau Ffestiniog, where he died in 1963.—Wikipedia</div><p style='margin-top:1em; clear:left;'><b>Available Formats</b></p><table summary='details' style='margin-left:2em;'><tr><td class='links'>FILE TYPE</td><td class='links'>LINK</td></tr><tr><td>UTF-8 text&#160;&#160;&#160;</td><td><a href='link.php?file=20250731.txt'>20250731.txt</a></td><td></td><td></td></tr>
<tr><td>HTML</td><td><a href='link.php?file=20250731.html'>20250731.html</a></td><td></td><td></td></tr>
<tr><td>Epub</td><td><a href='link.php?file=20250731.epub'>20250731.epub</a></td><td></td><td>If you cannot open a <i>.mobi</i> file on your mobile device, please use <i>.epub</i> with an appropriate eReader.</td></tr>
<tr><td>Epub, specific to Kindle</td><td><a href='link.php?file=20250731-k.epub'>20250731-k.epub</a></td><td></td><td></td></tr>
<tr><td>Mobi/Kindle</td><td><a href='link.php?file=20250731.mobi'>20250731.mobi</a></td><td><img src='/images/info.jpg' title='1.   Download the .mobi file into your computer’s Downloads Folder.
2.   Rename the file from [8-digit number].mobi to [my title].mobi.
3.   Connect your Kindle to your computer using the Kindle USB cable.
4.   Open the “documents” folder in the Kindle directory and Copy/Paste
        the renamed .mobi file into the “documents” folder.
5.   Eject your Kindle. The file will then appear in the Kindle Main Menu
        as a New item with the new renamed file name.' style='width:3mm;' alt='Info'/></td><td>Not all Kindles or Kindle apps open all <i>.mobi</i> files.</td></tr>
<tr><td>PDF (tablet)</td><td><a href='link.php?file=20250731-a5.pdf'>20250731-a5.pdf</a></td><td></td><td></td></tr>
<tr><td>HTML Zip</td><td><a href='link.php?file=20250731-h.zip'>20250731-h.zip</a></td><td></td><td></td></tr>
</table>    <p style='margin-top:1em; clear:left;'><b>Kindle Direct</b> <span style='font-size:smaller; font-style: italic;'>(New, Experimental)</span></p>
    <div style='margin-left:2em'>
    <p style='margin-top:1em'>
    Send this book direct to your kindle via email.
    We need your Send-to-Kindle Email address, which
    can be found by looking in your Kindle device’s Settings page.
    All kindle email addresses will end in <b>@kindle.com</b>.
    Note you must add our email server’s address,
    <b><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="8bedeaefeeeffbeaeceecbedeaefeeeffbeaeceea5e8e4e6">[email&#160;protected]</a></b>, to your Amazon account’s
    Approved E-mail list. This list may be found on your
    Amazon account:
        <i>Your Account</i>→
        <i>Manage Your Content and Devices</i>→
        <i>Preferences</i>→
        <i>Personal Document Settings</i>→
        <i>Approved Personal Document E-mail List</i>→
        <i>Add a new approved e-mail address</i>.
    <form id="KindleForm" onsubmit="return submitKindleForm();">
    <input type="hidden" name="bookid" id="bookid" value="20250731">
    Send to Kindle Email Address:
    <input type="text" name="email" id="email" size="40">
    <input type="submit" value="Send" name="submit">
    </form>
    <p style='margin-top:.3em;'><div id="kindle_result"></div></p>
    </div>
<p style='margin-top:2em'>This book is in the public domain in Canada, and is made available to you DRM-free.  You may do whatever you like with this book, but mostly we hope you will read it.</p>
    <p style='font-size:smaller'>Here at FadedPage and our companion site
    <a href="https://pgdpcanada.net">Distributed Proofreaders Canada</a>,
    we pride ourselves on producing the best ebooks you can find.
    <span id='showerror' class='inline errors'>
    Please tell us about any errors</span> you
    have found in this book, or in the information on this page about
    this book.</p>

    <div id='errors' style='display:none;'>
    <p>Please be clear in your message, if you are referring to the information
    found on this web page; or the contents of the book.  If the contents of the
    book, please be as precise as you can as to the location.  If the book
    has page numbers, please include the page number; otherwise please include
    a significant text string to help us to locate the error.
    <ul>
    <li>This report is anonymous. If you think we might need to communicate with
    you, please include your email address.</li>
    <li>While we strive to fix printer’s errors, many words found in our
    books may have archaic spelling.  If in doubt, we will always be
    cautious, and preserve the original spelling.</li>
    <li>Many books have significant or minor changes between editions.
    We will attempt to maintain the text of the edition that we worked from,
    unless there is an obvious correction. If you are comparing this work
    to a printed copy, please include the edition you used.</li> 
    <li>Most reports are processed within a few days of submission.
    If we decide not to incorporate your report, we will usually
    send you an email message telling you why.
    However, we can only email you if you include your email address!
    </li>
    </ul>
    <form id="ErrorForm" onsubmit="return submitErrorForm();">
    <input type="hidden" name="bookid" id="bookid" value="20250731"><br/>
        Message:<br/>
        <textarea rows="10" name="message" id="message" maxlength="100000" cols="80"></textarea><br/>
        <div id='recaptchaError' class='g-recaptcha-error' data-sitekey='6LcuEbUaAAAAAAQr9gsBHFWdpEsPTVAyh7FxkkJ8'>
        </div>
        <input type='hidden' class='hiddenRecaptcha' name='err_hiddenRecaptcha' id='err_hiddenRecaptcha'>
        <input type="submit" value="Submit" name="SubmitError">
        <span style='color:red; font-weight:bold;'>
            If you have asked a question, if you require any form
            of response: Please include your email!
            We cannot help you without your email address.
        </span>
        <br/>
    </form>
    </div>
    <div id="error_result"></div>

  </div> <!-- gradientBox -->

    <div class='footer'>
    <table class='foottab'><tr><td align='left'>Page Build Time: 0.002</td><td><a href='report_error.php'>Report a Bug</a></td><td id='foot' align='right'>&nbsp;&nbsp;&nbsp;<a href='index.php'>HOME</a></td></tr></table>  </div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
</html>
