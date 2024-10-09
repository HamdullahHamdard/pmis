<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-10 bg-white">
    <!-- Header -->
    <div class="mb-4 border-b border-black">
        <div class="flex items-center justify-between mb-2">
            <div><span class="">Form</span></div>
            <div><span class="">this is Afghanistan</span></div>
            <div><span class="">Formmrrr</span></div>
        </div>
        <div>
            <p>( NO-1 </p>
            <p>1400/4 -2 )</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-4 gap-4">
        <!-- Numbered Boxes -->
        <div class="col-span-3 space-y-2">
            <!-- Replace with your input fields -->
            <input type="text" placeholder="10">
            <input type="text" placeholder="9">
            <input type="text" placeholder="8">
            <input type="text" placeholder="7">
            <textarea class="h-20" placeholder="6"></textarea>
        </div>
        <!-- A-D Boxes -->
        <div class="col-span-1 space-y-2">
            <!-- Replace with your input fields -->
            <input type="text" placeholder="A">
            <input type="text" placeholder="B">
            <input type="text" placeholder="C">
            <input type="text" placeholder="D">
        </div>
    </div>

    <!-- Lines -->
    <div class="mt-4">
        <hr class="mb-1">
        <hr class="mb-1">
    </div>
</body>
</html>
