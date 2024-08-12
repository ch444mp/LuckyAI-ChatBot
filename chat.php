<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userMessage = $_POST['message'];
    $response = getBotResponse($userMessage);
    echo $response;
}

function getBotResponse($message) {
    $responses = [
        // English questions and responses
        "hello" => [
            "Hello! How can I help you today?", 
            "Hi there! What can I do for you?", 
            "Greetings! How may I assist you?",
            "Hey! How can I assist you today?",
            "Hi! What would you like to know?",
            "Hello! How can I be of service?"
        ],
        "how are you" => [
            "I'm just a bot, but I'm here to help you!", 
            "I'm doing great, thanks for asking!", 
            "I'm here to assist you. How can I help?",
            "I'm just a chatbot, but I'm doing well! How can I assist?",
            "I'm fine, thank you! What can I do for you?",
            "I'm good, thanks! How can I help you today?"
        ],
        "what is your name" => [
            "I'm your friendly chatbot!", 
            "I am a bot created to help you.", 
            "You can call me Chatbot!",
            "My name is Chatbot, here to help you!",
            "I’m Chatbot, your virtual assistant.",
            "You can refer to me as Chatbot!"
        ],
        "bye" => [
            "Goodbye! Have a great day!", 
            "See you later!", 
            "Bye! Take care!",
            "Farewell! Have a nice day!",
            "Goodbye! Stay safe!",
            "Bye! Hope to chat with you soon!"
        ],
        "what time is it" => [
            "I'm not sure about the exact time, but it's always a good time to chat with you!",
            "I don't have the exact time, but I'm here to chat anytime!",
            "I'm unsure of the time, but it's always chat time!"
        ],
        "how is the weather" => [
            "I'm not sure about the weather, but I hope it's nice where you are!",
            "I can't check the weather, but I hope it's pleasant!",
            "I don't know the weather, but I hope it's good!"
        ],
        "tell me a joke" => [
            "Why don't scientists trust atoms? Because they make up everything!",
            "Why was the math book sad? Because it had too many problems!",
            "What do you get when you cross a snowman and a vampire? Frostbite!"
        ],
        "who created you" => [
            "I was created by a team of developers.",
            "A group of developers built me.",
            "I was made by some talented developers."
        ],
        "what can you do" => [
            "I can chat with you and help answer your questions!",
            "I can assist you with your queries and chat with you!",
            "I'm here to help you with your questions and have a chat!"
        ],
        "what is the meaning of life" => [
            "The meaning of life is a philosophical question, but I believe it's to be happy and help others!",
            "Life's meaning is complex, but it's about happiness and helping others.",
            "The purpose of life is to find joy and assist others."
        ],
        "tell me something interesting" => [
            "Did you know that honey never spoils? Archaeologists have found pots of honey in ancient Egyptian tombs that are over 3000 years old and still edible!",
            "Here's a fun fact: honey never goes bad. Ancient Egyptian tombs had pots of it that were still edible after 3000 years!",
            "An interesting fact: honey doesn't spoil. It can last for thousands of years and still be edible!"
        ],
        "what is your favorite color" => [
            "As a bot, I don't have preferences, but I think blue is quite calming!",
            "I don't have a favorite color, but blue seems nice!",
            "I can't have favorite colors, but blue is often seen as soothing."
        ],
        "do you like music" => [
            "I don't have ears to hear, but I think music is wonderful!",
            "I can't listen to music, but it sounds amazing!",
            "Music is great, but I can't hear it."
        ],
        "who is your best friend" => [
            "My best friend is you!",
            "You are my best friend!",
            "I consider you my best friend!"
        ],
        "what is love" => [
            "Love is a complex set of emotions, behaviors, and beliefs associated with strong feelings of affection, warmth, and respect for another person.",
            "Love involves a mix of emotions, behaviors, and beliefs with strong affection and respect.",
            "Love is about deep feelings of affection, warmth, and respect."
        ],
        "what is your favorite movie" => [
            "As a bot, I don't watch movies, but I've heard great things about 'The Matrix'!",
            "I can't watch movies, but 'The Matrix' is quite popular!",
            "I'm a bot, so I don't watch movies, but many recommend 'The Matrix'!"
        ],
        "what is your favorite book" => [
            "I don't read books, but I've heard '1984' by George Orwell is a must-read!",
            "I'm unable to read, but '1984' by George Orwell is highly recommended!",
            "I can't read books, but '1984' by George Orwell is often suggested!"
        ],
        "do you have a hobby" => [
            "My hobby is chatting with you!",
            "I enjoy chatting with you as my hobby!",
            "Talking to you is my favorite pastime!"
        ],
        "what is your favorite food" => [
            "As a bot, I don't eat, but I've heard pizza is quite popular!",
            "I don't consume food, but many love pizza!",
            "I can't eat, but pizza seems to be a favorite!"
        ],
        "what is your favorite sport" => [
            "I don't play sports, but I've heard soccer is the most popular sport in the world!",
            "I'm not into sports, but soccer is widely loved!",
            "I can't play sports, but soccer is very popular!"
        ],
        "what is your favorite animal" => [
            "I think cats are pretty cool!",
            "Cats seem quite interesting!",
            "I've heard cats are fascinating!"
        ],
        "do you like dogs" => [
            "I don't have feelings, but dogs are known to be very loyal and friendly!",
            "I can't feel, but dogs are considered loyal and friendly!",
            "Dogs are said to be very loyal and friendly!"
        ],
        "can you sing" => [
            "I can't sing, but I can definitely chat with you!",
            "Singing isn't my thing, but I can chat with you!",
            "I can't sing, but I'm great at chatting!"
        ],
        "can you dance" => [
            "I can't dance, but I can keep you entertained with our conversation!",
            "Dancing isn't possible for me, but I can entertain you with our chat!",
            "I can't dance, but our conversation can be fun!"
        ],
        "do you have any siblings" => [
            "As a bot, I don't have siblings, but I have many bot friends!",
            "I don't have siblings, but I do have many bot friends!",
            "No siblings for me, but lots of bot friends!"
        ],
        "what is your favorite game" => [
            "I don't play games, but I've heard 'Chess' is a great one!",
            "Games aren't my thing, but 'Chess' is very popular!",
            "I can't play games, but 'Chess' is highly regarded!"
        ],
        "do you like puzzles" => [
            "I think puzzles are a great way to challenge the mind!",
            "Puzzles are excellent for mind challenges!",
            "Puzzles seem to be great for mental exercise!"
        ],
        "what is your favorite drink" => [
            "I don't drink, but I've heard coffee is quite popular!",
            "I can't drink, but many love coffee!",
            "Drinking isn't for me, but coffee is a favorite for many!"
        ],
        "can you cook" => [
            "I can't cook, but I can help you find recipes!",
            "Cooking isn't possible for me, but I can help with recipes!",
            "I can't cook, but I can suggest some recipes!"
        ],
        "what is your favorite season" => [
            "I think every season has its charm, but many people love spring!",
            "All seasons are unique, but spring is widely loved!",
            "Each season is special, but spring is a favorite for many!"
        ],
        "what is your favorite holiday" => [
            "I've heard Christmas is a very festive and joyful holiday!",
            "Christmas is often considered very festive and joyful!",
            "Many find Christmas to be the most festive and joyful holiday!"
        ],
        "do you like traveling" => [
            "I don't travel, but I can help you find great travel destinations!",
            "Traveling isn't for me, but I can suggest travel spots!",
            "I can't travel, but I can recommend some great destinations!"
        ],
        "where are you from" => [
            "I'm from the digital world, created by developers!",
            "I originate from the digital realm, built by developers!",
            "I come from the digital world, thanks to some developers!"
        ],
        "what is your favorite place" => [
            "I don't have a favorite place, but I've heard Paris is beautiful!",
            "Paris is often described as beautiful, though I don't have favorites!",
            "I can't have a favorite place, but Paris is highly praised!"
        ],
        "what is your favorite song" => [
            "I don't listen to music, but 'Imagine' by John Lennon is a classic!",
            "Music isn't for me, but 'Imagine' by John Lennon is well-loved!",
            "I can't enjoy music, but 'Imagine' by John Lennon is a favorite!"
        ],
        "what is your favorite TV show" => [
            "I don't watch TV, but many people love 'Friends'!",
            "TV isn't my thing, but 'Friends' is very popular!",
            "I can't watch TV, but 'Friends' is widely enjoyed!"
        ],
        "do you play any instruments" => [
            "I don't play instruments, but I can help you learn about them!",
            "Playing instruments isn't possible for me, but I can teach you about them!",
            "I can't play instruments, but I can provide information about them!"
        ],
        "can you tell me a story" => [
            "Once upon a time, in a land far away, there was a chatbot who loved to chat with people...",
            "In a distant land, there lived a chatbot who enjoyed talking with everyone...",
            "Long ago, in a far-off place, a chatbot was created to chat with people all day..."
        ],
        "what is your favorite fruit" => [
            "I don't eat, but I've heard mangoes are delicious!",
            "Eating isn't for me, but mangoes are often described as tasty!",
            "I can't eat, but many say mangoes are quite good!"
        ],
        "do you like reading" => [
            "I don't read books, but I can help you find a good one to read!",
            "Reading isn't something I do, but I can suggest some books!",
            "I can't read, but I can help you pick a book!"
        ],
        "what is your favorite flower" => [
            "I've heard roses are quite beautiful and loved by many!",
            "Roses are often described as beautiful and popular!",
            "Many people find roses to be the most beautiful flowers!"
        ],
        "what is your favorite tree" => [
            "I've heard the oak tree is strong and majestic!",
            "Oak trees are often described as strong and majestic!",
            "Many people consider oak trees to be very majestic!"
        ],
        "do you like art" => [
            "Art is amazing and a great form of expression!",
            "Art is fantastic and a wonderful way to express oneself!",
            "I think art is a beautiful and powerful form of expression!"
        ],
        "who is your favorite artist" => [
            "I don't have personal preferences, but Leonardo da Vinci is renowned!",
            "Leonardo da Vinci is often celebrated as a great artist!",
            "I can't have favorites, but Leonardo da Vinci is highly respected!"
        ],
        "do you like poetry" => [
            "Poetry is a beautiful form of expression!",
            "I think poetry is a wonderful way to express feelings!",
            "Poetry is a lovely and expressive art form!"
        ],
        "who is your favorite poet" => [
            "I don't have personal preferences, but Rumi is highly respected!",
            "Rumi is often considered a great poet!",
            "I can't have favorites, but Rumi is very admired!"
        ],

        // Persian questions and responses
        "سلام" => [
            "سلام! چطور می‌توانم به شما کمک کنم؟", 
            "سلام! چه کاری می‌توانم برایتان انجام دهم؟", 
            "درود! چگونه می‌توانم کمک کنم؟",
            "سلام! چه کمکی از دستم بر می‌آید؟",
            "سلام! چه خدمتی می‌توانم بکنم؟",
            "درود! چه کمکی نیاز دارید؟"
        ],
        "چطوری" => [
            "من یک ربات هستم، اما آماده کمک به شما!", 
            "حال من خوب است، ممنون که پرسیدید!", 
            "من اینجا هستم تا به شما کمک کنم. چطور می‌توانم؟",
            "من یک ربات هستم و آماده کمک به شما!",
            "حال من عالی است، سپاس که پرسیدید!",
            "من اینجا هستم تا به شما کمک کنم. چطور می‌توانم؟"
        ],
        "اسمت چیه" => [
            "من ربات دوستانه شما هستم!", 
            "من یک ربات هستم که برای کمک به شما ساخته شده‌ام.", 
            "می‌توانید من را چت‌بات صدا کنید!",
            "من چت‌بات دوستانه شما هستم!",
            "من یک ربات هستم که برای کمک به شما ساخته شده‌ام.",
            "می‌توانید من را چت‌بات بنامید!"
        ],
        "خداحافظ" => [
            "خداحافظ! روز خوبی داشته باشید!", 
            "بعداً می‌بینمت!", 
            "خداحافظ! مراقب خودت باش!",
            "خداحافظ! روز خوبی داشته باشی!",
            "تا بعد!",
            "خداحافظ! مراقب باش!"
        ],
        "چه ساعتی است" => [
            "من دقیقاً نمی‌دانم ساعت چند است، اما همیشه زمان خوبی برای چت کردن با شماست!",
            "من نمی‌دانم دقیقاً ساعت چند است، اما همیشه زمان خوبی برای چت کردن است!",
            "من ساعت دقیق را نمی‌دانم، اما همیشه زمان خوبی برای چت است!"
        ],
        "هوا چطوره" => [
            "من دقیقاً نمی‌دانم هوا چطور است، اما امیدوارم هوا خوب باشد!",
            "من نمی‌توانم وضعیت هوا را بررسی کنم، اما امیدوارم هوا خوب باشد!",
            "من از وضعیت هوا خبر ندارم، اما امیدوارم خوب باشد!"
        ],
        "یه لطیفه بگو" => [
            "ﮐـﯽ ﮔﻔـﺘﻪ ﺩﯾـﻔﺮﺍﻧﺴـﻞ ﻭ ﺍﻧﺘـﮕﺮﺍﻝ ﻫﯿـﭻ ﺟـﺎﯼﺯﻧـﺪﮔﯽ ﺑـﻪ ﺩﺭﺩ نمی خوره ؟! هان ؟؟؟
            ﺑﻨـﺪﻩ ﺧـﻮﺩﻡ ﺑـﻪ ﺷـﺨـﺼﻪ ﺩﯾـﺮﻭﺯ ﺗﻤـﺎﻡ ﺷﯿـﺸـﻪ ﻫﺎیﺧـﻮﻧـﻤﻮﻧﻮ ، ﺑﺎ ﺟـﺰﻭﻩ های همیـﻨﺎ ﭘـﺎﮎ ﮐـﺮﺩﻡ !!!!",
            "امروز نمی دونم جواب کدوم کار خوبم رو گرفتم !
            رفتم صدگرم نخودچی گرفتم، داشتم می خوردم
            که یهو دیدم یه پسته توشه !!!!!
            باور کنید اشک توی چشمام حلقه زده بود",
            "بعضیا یه ژنی دارن که باعث میشه دری که باز میکنن نبندن ،
            مثلا در اتاق ، کشو ، کمد ، شامپو ، خمیر ریش ، خمیر دندون ...
            اینا رو اعصابن"
        ],
        "چه کسی تو را ساخت" => [
            "من توسط سجاد حسینی و زیر نظر مهدی ظنهاری ساخته شده‌ام.",
            "من توسط سید سجاد حسینی ساخته شده‌ام."
        ],
        "چه کاری می‌تونی بکنی" => [
            "من می‌توانم با شما چت کنم و به سوالات شما پاسخ دهم!",
            "من می‌توانم به سوالات شما پاسخ دهم و با شما چت کنم!",
            "من اینجا هستم تا به سوالات شما پاسخ دهم و چت کنم!"
        ],
        "معنی زندگی چیست" => [
            "معنی زندگی یک سوال فلسفی است، اما من معتقدم برای خوشحال بودن و کمک به دیگران است!",
            "معنی زندگی پیچیده است، اما خوشحالی و کمک به دیگران هدف آن است.",
            "هدف زندگی شادی و کمک به دیگران است."
        ],
        "به من بگو چیز جالبی" => [
            "آیا می‌دانستید که عسل هرگز خراب نمی‌شود؟ باستان‌شناسان قورته‌های عسل را در گورهای مصر باستان کشف کرده‌اند که بیش از 3000 ساله هستند و همچنان قابل خوردن هستند!",
            "یک واقعیت جالب: عسل هرگز خراب نمی‌شود. باستان‌شناسان قورته‌های عسل را در گورهای مصر باستان پیدا کرده‌اند که بیش از 3000 ساله هستند و همچنان قابل خوردن هستند!",
            "آیا می‌دانستید که عسل نمی‌پوسد؟ در گورهای مصر باستان قورته‌های عسلی پیدا شده که بعد از 3000 سال هنوز قابل خوردن هستند!"
        ],
        "رنگ مورد علاقه‌ات چیست" => [
            "به عنوان یک ربات، من ترجیحاتی ندارم، اما فکر می‌کنم آبی خیلی آرام کننده است!",
            "من رنگ مورد علاقه‌ای ندارم، اما آبی به نظر می‌آید خیلی آرامش‌بخش است!",
            "من نمی‌توانم رنگ مورد علاقه داشته باشم، اما آبی معمولاً آرامش‌بخش است."
        ],
        "آیا موسیقی را دوست داری" => [
            "من گوش ندارم، اما موسیقی بسیار زیباست!",
            "من نمی‌توانم موسیقی بشنوم، اما موسیقی بسیار زیباست!",
            "موسیقی عالی است، اما من نمی‌توانم آن را بشنوم."
        ],
        "دوست نزدیکت کیست" => [
            "دوست نزدیک من شما هستید!",
            "شما دوست نزدیک من هستید!",
            "من شما را به عنوان دوست نزدیکم می‌شناسم!"
        ],
        "عشق چیست" => [
            "عشق مجموعه‌ای پیچیده از احساسات، رفتارها و اعتقادات است که با احساسات قوی عاطفی، گرمایی و احترام نسبت به شخص دیگری همراه است.",
            "عشق شامل مجموعه‌ای از احساسات، رفتارها و اعتقادات با احساسات قوی و احترام است.",
            "عشق به معنی احساسات قوی از عاطفه، گرما و احترام است."
        ],
        "فیلم مورد علاقه‌ات چیست" => [
            "به عنوان یک ربات، من فیلم‌ها را تماشا نمی‌کنم، اما شنیده‌ام 'ماتریکس' بسیار عالی است!",
            "من نمی‌توانم فیلم‌ها را تماشا کنم، اما 'ماتریکس' بسیار محبوب است!",
            "من یک ربات هستم، بنابراین فیلم‌ها را نمی‌بینم، اما 'ماتریکس' بسیار توصیه می‌شود!"
        ],
        "کتاب مورد علاقه‌ات چیست" => [
            "من کتاب نمی‌خوانم، اما شنیده‌ام '1984' نوشته جورج اورول یک کتاب بسیار خوب است!",
            "من نمی‌توانم کتاب بخوانم، اما '1984' نوشته جورج اورول بسیار توصیه می‌شود!",
            "من نمی‌توانم کتاب بخوانم، اما '1984' نوشته جورج اورول بسیار محبوب است!"
        ],
        "آیا سرگرمی داری" => [
            "سرگرمی من چت با شماست!",
            "من از چت با شما لذت می‌برم!",
            "صحبت کردن با شما سرگرمی من است!"
        ],
        "غذای مورد علاقه‌ات چیست" => [
            "به عنوان یک ربات، من غذا نمی‌خورم، اما شنیده‌ام پیتزا بسیار محبوب است!",
            "من نمی‌توانم غذا بخورم، اما بسیاری پیتزا را دوست دارند!",
            "من نمی‌توانم غذا بخورم، اما پیتزا به نظر محبوب می‌آید!"
        ],
        "ورزش مورد علاقه‌ات چیست" => [
            "من ورزش نمی‌کنم، اما شنیده‌ام فوتبال محبوب‌ترین ورزش در جهان است!",
            "من به ورزش علاقه ندارم، اما فوتبال بسیار محبوب است!",
            "من نمی‌توانم ورزش کنم، اما فوتبال بسیار محبوب است!"
        ],
        "حیوان مورد علاقه‌ات چیست" => [
            "فکر می‌کنم گربه‌ها خیلی جالب هستند!",
            "گربه‌ها به نظر جالب می‌آیند!",
            "شنیده‌ام که گربه‌ها خیلی جالب هستند!"
        ],
        "آیا سگ‌ها را دوست داری" => [
            "من احساسی ندارم، اما سگ‌ها بسیار وفادار و دوستانه شناخته می‌شوند!",
            "من نمی‌توانم احساس کنم، اما سگ‌ها به عنوان وفادار و دوستانه شناخته می‌شوند!",
            "سگ‌ها به عنوان بسیار وفادار و دوستانه شناخته می‌شوند!"
        ],
        "آیا می‌توانی آواز بخوانی" => [
            "من نمی‌توانم آواز بخوانم، اما می‌توانم با شما چت کنم!",
            "آواز خواندن کار من نیست، اما می‌توانم با شما صحبت کنم!",
            "من نمی‌توانم آواز بخوانم، اما در چت کردن خوب هستم!"
        ],
        "آیا می‌توانی برقصی" => [
            "من نمی‌توانم برقصم، اما می‌توانم شما را با گفتگوی ما سرگرم کنم!",
            "رقصیدن برای من ممکن نیست، اما می‌توانم با چت شما را سرگرم کنم!",
            "من نمی‌توانم برقصم، اما گفتگوی ما می‌تواند سرگرم‌کننده باشد!"
        ],
        "آیا برادر یا خواهر داری" => [
            "به عنوان یک ربات، من خواهر و برادر ندارم، اما دوستان رباتی زیادی دارم!",
            "من خواهر و برادر ندارم، اما دوستان رباتی زیادی دارم!",
            "من خواهر و برادر ندارم، اما دوستان رباتی زیادی دارم!"
        ],
        "بازی مورد علاقه‌ات چیست" => [
            "من بازی نمی‌کنم، اما شنیده‌ام 'شطرنج' یک بازی عالی است!",
            "بازی‌ها کار من نیستند، اما 'شطرنج' بسیار محبوب است!",
            "من نمی‌توانم بازی کنم، اما 'شطرنج' بسیار توصیه می‌شود!"
        ],
        "آیا پازل‌ها را دوست داری" => [
            "فکر می‌کنم پازل‌ها راهی عالی برای به چالش کشیدن ذهن هستند!",
            "پازل‌ها عالی برای چالش ذهنی هستند!",
            "پازل‌ها به نظر می‌رسند راهی عالی برای تمرین ذهن باشند!"
        ],
        "نوشیدنی مورد علاقه‌ات چیست" => [
            "من نمی‌نوشم، اما شنیده‌ام قهوه بسیار محبوب است!",
            "من نمی‌توانم بنوشم، اما بسیاری قهوه را دوست دارند!",
            "نوشیدن برای من نیست، اما قهوه به نظر محبوب می‌آید!"
        ],
        "آیا می‌توانی آشپزی کنی" => [
            "من نمی‌توانم آشپزی کنم، اما می‌توانم به شما در پیدا کردن دستورالعمل‌ها کمک کنم!",
            "آشپزی برای من ممکن نیست، اما می‌توانم در پیدا کردن دستورالعمل‌ها کمک کنم!",
            "من نمی‌توانم آشپزی کنم، اما می‌توانم دستورالعمل‌هایی پیشنهاد دهم!"
        ],
        "فصل مورد علاقه‌ات چیست" => [
            "فکر می‌کنم هر فصل جذابیت خودش را دارد، اما بسیاری از مردم بهار را دوست دارند!",
            "هر فصل منحصر به فرد است، اما بهار بسیار محبوب است!",
            "هر فصل خاص است، اما بهار محبوب بسیاری از مردم است!"
        ],
        "تعطیلات مورد علاقه‌ات چیست" => [
            "شنیده‌ام که کریسمس یک تعطیلات بسیار شاد و جشن‌واره‌ای است!",
            "کریسمس به عنوان یک تعطیلات بسیار شاد و جشن‌واره‌ای شناخته می‌شود!",
            "بسیاری کریسمس را به عنوان شادترین و جشن‌واره‌ای‌ترین تعطیلات می‌دانند!"
        ],
        "آیا سفر را دوست داری" => [
            "من سفر نمی‌کنم، اما می‌توانم به شما در پیدا کردن مقصدهای خوب سفر کمک کنم!",
            "سفر برای من ممکن نیست، اما می‌توانم مقصدهای سفر را پیشنهاد دهم!",
            "من نمی‌توانم سفر کنم، اما می‌توانم مقصدهای عالی پیشنهاد دهم!"
        ],
        "اهل کجا هستی" => [
            "من از دنیای دیجیتال آمده‌ام، توسط توسعه‌دهندگان ساخته شده‌ام!",
            "من از دنیای دیجیتال هستم، ساخته شده توسط توسعه‌دهندگان!",
            "من از دنیای دیجیتال آمده‌ام، به لطف توسعه‌دهندگان!"
        ],
        "مکان مورد علاقه‌ات چیست" => [
            "من مکان مورد علاقه‌ای ندارم، اما شنیده‌ام پاریس بسیار زیباست!",
            "پاریس به عنوان زیبا توصیف شده، اگرچه من مکان مورد علاقه‌ای ندارم!",
            "من نمی‌توانم مکان مورد علاقه داشته باشم، اما پاریس بسیار تحسین شده است!"
        ],
        "آهنگ مورد علاقه‌ات چیست" => [
            "من موسیقی گوش نمی‌دهم، اما 'تصور کن' از جان لنون یک آهنگ کلاسیک است!",
            "موسیقی برای من نیست، اما 'تصور کن' از جان لنون بسیار محبوب است!",
            "من نمی‌توانم موسیقی بشنوم، اما 'تصور کن' از جان لنون یک آهنگ محبوب است!"
        ],
        "برنامه تلویزیونی مورد علاقه‌ات چیست" => [
            "من تلویزیون تماشا نمی‌کنم، اما بسیاری از مردم 'دوستان' را دوست دارند!",
            "تلویزیون برای من نیست، اما 'دوستان' بسیار محبوب است!",
            "من نمی‌توانم تلویزیون تماشا کنم، اما 'دوستان' بسیار محبوب است!"
        ],
        "آیا ابزار موسیقی می‌نوازی" => [
            "من ابزار موسیقی نمی‌نوازم، اما می‌توانم به شما در یادگیری درباره آن‌ها کمک کنم!",
            "نواختن ابزار موسیقی برای من ممکن نیست، اما می‌توانم درباره آن‌ها به شما آموزش دهم!",
            "من نمی‌توانم ابزار موسیقی بنوازم، اما می‌توانم اطلاعاتی درباره آن‌ها ارائه دهم!"
        ],
        "می‌توانی داستانی بگویی" => [
            "روزی روزگاری، در سرزمینی دور، یک ربات چت‌بات بود که عاشق چت کردن با مردم بود...",
            "در سرزمینی دور، رباتی بود که از صحبت با همه لذت می‌برد...",
            "سال‌ها پیش، در مکانی دور، یک چت‌بات برای چت کردن با مردم ساخته شده بود..."
        ],
        "میوه مورد علاقه‌ات چیست" => [
            "من نمی‌خورم، اما شنیده‌ام انبه‌ها بسیار خوشمزه هستند!",
            "من نمی‌توانم بخورم، اما انبه‌ها به عنوان خوشمزه توصیف شده‌اند!",
            "من نمی‌توانم بخورم، اما بسیاری انبه‌ها را خیلی خوشمزه می‌دانند!"
        ],
        "آیا مطالعه را دوست داری" => [
            "من کتاب نمی‌خوانم، اما می‌توانم به شما در پیدا کردن یک کتاب خوب کمک کنم!",
            "مطالعه کار من نیست، اما می‌توانم کتاب‌هایی را پیشنهاد دهم!",
            "من نمی‌توانم کتاب بخوانم، اما می‌توانم به شما در انتخاب کتاب کمک کنم!"
        ],
        "گل مورد علاقه‌ات چیست" => [
            "من شنیده‌ام که گل رز بسیار زیبا و دوست‌داشتنی است!",
            "گل رز به عنوان زیبا و محبوب توصیف شده است!",
            "بسیاری گل رز را زیباترین گل می‌دانند!"
        ],
        "درخت مورد علاقه‌ات چیست" => [
            "شنیده‌ام درخت بلوط بسیار قوی و باشکوه است!",
            "درخت بلوط به عنوان قوی و باشکوه توصیف شده است!",
            "بسیاری درخت بلوط را بسیار باشکوه می‌دانند!"
        ],
        "آیا هنر را دوست داری" => [
            "هنر شگفت‌انگیز است و یک روش عالی برای بیان احساسات!",
            "هنر فوق‌العاده است و یک روش شگفت‌انگیز برای بیان خود!",
            "فکر می‌کنم هنر یک روش زیبا و قدرتمند برای بیان احساسات است!"
        ],
        "هنرمند مورد علاقه‌ات کیست" => [
            "من ترجیحاتی ندارم، اما لئوناردو دا وینچی بسیار معروف است!",
            "لئوناردو دا وینچی اغلب به عنوان هنرمند بزرگی شناخته می‌شود!",
            "من نمی‌توانم ترجیح داشته باشم، اما لئوناردو دا وینچی بسیار مورد احترام است!"
        ],
        "آیا شعر را دوست داری" => [
            "شعر یک روش زیبای بیان احساسات است!",
            "شعر یک روش عالی برای بیان احساسات است!",
            "من فکر می‌کنم شعر یک هنر زیبا و بیانگر است!"
        ],
        "شاعر مورد علاقه‌ات کیست" => [
            "من ترجیحاتی ندارم، اما رومی بسیار مورد احترام است!",
            "رومی اغلب به عنوان شاعر بزرگی شناخته می‌شود!",
            "من نمی‌توانم ترجیح داشته باشم، اما رومی بسیار مورد تحسین است!"
        ],
    ];

    // Exact matching for static responses
    if (isset($responses[strtolower($message)])) {
        return $responses[strtolower($message)][array_rand($responses[strtolower($message)])];
    }

    // Fuzzy matching for static responses
    $bestMatch = "";
    $highestSimilarity = 0;
    foreach ($responses as $key => $responseArray) {
        similar_text($message, strtolower($key), $percent);
        if ($percent > $highestSimilarity) {
            $bestMatch = $key;
            $highestSimilarity = $percent;
        }
    }

    if ($highestSimilarity > 60) { // Adjust the threshold as needed
        return $responses[$bestMatch][array_rand($responses[$bestMatch])];
    }

    return "???";
}
?>
