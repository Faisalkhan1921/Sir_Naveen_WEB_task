<style>
    * {
box-sizing: border-box;
margin: 0;
padding: 0;
}


header {
background-color: #333;
color: #fff;
padding: 10px;
}

nav {
background-color: #444;
color: #fff;
display: flex;
justify-content: space-between;
align-items: center;
padding: 10px;
}

nav ul {
list-style: none;
display: flex;
}

nav li {
margin-right: 10px;
}

nav li:last-child {
margin-right: 0;
}

nav a {
color: #fff;
text-decoration: none;
}

aside {
background-color: #f1f1f1;
width: 250px;
height: calc(100% - 90px);
position: fixed;
/* top: 90px; */
left: 0;
overflow-y: auto;
}

aside ul {
list-style: none;
}

aside li {
margin-bottom: 10px;
}

aside a {
display: block;
padding: 10px;
color: #333;
text-decoration: none;
}

aside ul li:hover {
background-color: #333;
color: #fff;
}

aside ul li.active {
background-color: blue;
}




aside ul li a:hover {
/* background-color: #333; */
color: #fff;
}

main {
margin: 90px 0 0 250px;
padding: 20px;
overflow-y: scroll;
max-height: 80vh;
}

footer {
background-color: #333;
color: #fff;
text-align: center;
padding: 1rem;
position: absolute;
bottom: 0;
width: 100%;
}


</style>
