<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTdiaF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ASSESSORS | PRINTABLE </title>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Dumaguete_seal.svg/1200px-Dumaguete_seal.svg.png" type="image/x-icon">
    <link rel="stylesheet" href=" {{asset('css/app.css')}} ">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src=" {{ asset('js/app.js') }} "></script>
</head>
<body class="bg-white min-h-full flex flex-col">

<div class="max-w-7xl mx-auto my-auto">


    <div class="px-10 font-sans">

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
            <div class="flex flex-col">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Dumaguete_seal.svg/1200px-Dumaguete_seal.svg.png" class="w-32 h-32 text-white p-2 bg-white rounded-full">
                <h2 class="text-4xl sm:py-5">Dumaguete City Assessor's Office</h2>
                <h2 class="text-2xl sm:py-2">{{auth()->user()->name}}</h2>
                <span class="text-gray-500">{{auth()->user()->email}}</span>
            </div>

            <div class="flex flex-col sm:justify-end sm:items-end">
                <h2 class="text-4xl text-gray-500 sm:py-5">Request Approved!</h2>
                <dl class="max-w-1/2">
                    <div class="grid grid-cols-2 items-end">
                        <dt class="text-gray-500 ">
                            Appointment ID:
                        </dt>
                        <dd class="text-right">
                            {{ $appointment->id }}
                        </dd>
                    </div>
                    <div class="grid grid-cols-2">
                        <dt class="text-gray-500">
                            Service:
                        </dt>
                        <dd class="text-right truncate">
                            {{ $appointment->type }}
                        </dd>
                    </div>
                    <div class="grid grid-cols-2">
                        <dt class="text-gray-500">
                            Appointment Schedule:
                        </dt>
                        <dd class="text-right">
                            {{ $appointment->schedule }}
                        </dd>
                    </div>
                </dl>

            </div>
        </div>
        <div class="overflow-hidden my-4">
                <table class="min-w-full">
                    <thead class="text-bold">
                    <tr>
                        <th scope="col"
                            class="text-left w-2/5 sm:px-8 py-4">
                            Description
                        </th>
                        <th scope="col"
                            class="text-left w-1/5 sm:px-8 py-4">
                            Service Fee
                        </th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                    <tr class="text-left bg-gray-50">
                        <td class="sm:px-8 py-4">
                            {{ $appointment->type }}
                        </td>
                        <td class="sm:px-8 py-4">
                            P50.00
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="2" class="">
                            &nbsp;
                        </td>
                        <td class="sm:px-8 py-4">
                            Subtotal
                        </td>
                        <td class="sm:px-8 py-4 text-right">
                            P50.00
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        <div class="flex flex-col mt-4">
            <h1 class="mb-4 text-3xl">Pay via GCash</h1>
            <img src="data:image/gif;base64,R0lGODlhhACEAJEAAAAAAP///wAAAAAAACH5BAEAAAIALAAAAACEAIQAAAL/jI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8chQNf2jeeIzeRAr1v4dr6ikWJMBg084TIxdOKIyupvYrVSr4po97ltMrNKJDm5BU6lN3X7cEZjaxhxwBvBp+F0Pq3eJ2Fn9uf3JghmuDdWaDH48IjYeJfooKeIychVEdnQCWF3aVlJORkayIkKilqW6fnUOjq5WFpEu2oqp4l7WCsKpeoaW0u4OfxpeHoEGbybDNv8mrvsLNs77Jb9vFadx6pL7Mrxq62Jh/w1bSscDcjtrX7ezhYGrQ5CTr99PZ9uDK5s0zhS5XzZE8gs3sGBs+a8CyivobV6D/vBQyiJn8KK/xKl/aMWTgM6jwEpasTo0WTJDSPdrDS30CFKXi6/3ZP5MlXHgsVq3uzGK2dPme5QRvw4k41QokwdRTt6K+HJosXicERKK6dWq/n8cd36M6RYsF9b7uOa1SZWdmHLvgvqNm1btXKRuk2qYinMjl1ljNBrkC9BvyQA/+pLGB9dpU8Hy4Co9mgnyeCidkPM9iRlwVexicts9vLBzUZHV/4s+q1UkyojN+58Gihoi605l47j065p1f6qkppsNXdt3byB7WRcHDhu5MQ1OxYLN/nrM8LPui5uOeVs6VdZo+6Auff2Xt5TT/37vCBk7uf3rhUR3vj7wOT31QXMsH7G4WSj6/+nrxxe8g3lHlTfDZdbgARexN9isnn1W2zQrdYUgDE9KN9hEoY2oTXrNRfgSJ6JlB5z5Vlom4gSFsXhiaSFaNGIGcTn4m7/9SUji7RRaB5PmdE0HpAYCjnWdOrF6CB9RLb443cKHtike0vuKF6P+lTZ4YBB8phlghHCNtdxWJJBpH8agjkfhx/iSCWKN9pY14Jkcmnml86FKeB9K0I50ZUXPYkhWvb5uWB21Y053ZxSElqhoSb6CaMWg2JZKJ8ZGulkcJNquV+m7CmG5qFKVhjpbXnidJ2pH8qZKKYekCZqfIbZCeqdqqZKlXViukkjo+Yx2WeBSC5Hom0n5oegVIr/zujqqK+mqiKxzBq7aa5DRnnpro4uyi14SR6ZYpvR2lrrtkWGq62lsH6AH7bH0vlotygA26WyAF3IaQn07ptFjdSawG+6EIJkIKXoCZyvbwTja67C1KkLp653reNUWeauK+zEFOv01cURZ6xxiQM/fG23L4bcK3zPydhuyYm9OzKg9br8srzMyTxuzX8Ou3Gc8D6rsZ4gOeyzzRndJXTPqOIJ884Wj5eys+c2p+PTv+7pYZKrXhDwfD4iOnS8M2tXsde+5pvjpl1bO3bOEvvX8NlT7uo2yHBbCu7G48qcHcpxX92dvf8mLPGyakL7rdh9t2r12Em3LPXi6HaMN9RamTNOud2Fi4z2vWE1KKnmIEe95uWTCyo6r5w/bvqtjR+jadnJAq60zgYH6ybr2NlOs+V4ps374Ru1pzrChAl/6u1TN3238mtz3ezWZfNdufJlYks6rXL/zCCkuEL/6fZZv554p6N7bvbRcblL6vpWTu/+8uCD2C/76pP/efv4p897//7/D8AACnCABCygAQ+IwAQqcIEMXEABAAA7" height="128" width="128" alt="">
        </div>
    </div>
</div>
</body>
</html>
