<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cal+Sans&family=Cascadia+Mono:ital,wght@0,200..700;1,200..700&family=Tagesschrift&display=swap');

        .grandparent {
            /* border: 1px solid white; */
            width: 71.5em;
            height: 7em;
        }


        .myborder {
            /* position: relative; */
            margin-top: 4px;
            /* display: flex; */
            /* border: 1px solid; */
            /* width: 110%; */
            height: 9em;
            /* flex-direction: row; */
            justify-content: space-between;
        }

        #profilepic {
            /* border: 1px solid; */
            position: absolute;
            /* right: -13em;
            top: -1em; */
            left: 70%;
            top: 13em;
            /* width: 10em; */
            padding: 5px;
        }

        #mypropic {
            width: 180px;
            border: 5px solid rgb(22, 20, 20);
        }

        #avatar {
            color: rgb(238, 231, 231);
            font-family: Tagesschrift;
            margin-bottom: 1em;
            /* margin-left: 10em; */
        }

        #buttons {
            border-radius: 7px;
            background-color:rgb(236, 222, 222);
            color: rgb(48, 41, 41);
            margin-bottom: 1em;
            box-shadow: 0 8px  rgb(129, 110, 110);
            font-family: Tagesschrift;
            transition: background-color 0.5s;
            /* transition-delay: 1s; */
        }

        #buttons:active {
            color: rgb(238, 231, 231);
            font-family: Tagesschrift;
            /* font-weight: bold; */
            margin-bottom: 1em;
            box-shadow: 0 4px rgb(146, 119, 119);
            transform: translate(0px, 4px);
            background-color: green;
        }
    </style>
</head>

<body>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grandparent">
            <div class="myborder">
                <div class="mb-4">
                    <label id="avatar" class="block mb-2">Avatar</label>
                    <input type="file" name="avatar" class="border p-5 w-small">
                </div>

                @if(auth()->user()->avatar)
                <div id="profilepic" class="mb-4">
                    <img id="mypropic" src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar" class="w-5 h-8 rounded-full">
                </div>
                @endif
            </div>
        </div>

        <button type="submit" id="buttons" class="bg-blue-500 text-black px-4 py-2 rounded">
            Update Avatar
        </button>
    </form>





</body>

</html>