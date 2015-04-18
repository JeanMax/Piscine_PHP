"use strict";

var list = document.getElementById("ft_list"),
	id = 0,
	count, val;


function setCookie(cname, cvalue)
{
    var d = new Date(),
		expires;

    d.setTime(d.getTime() + 30*24*60*60*1000);
    expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname)
{
    var name = cname + "=";
    var ca = document.cookie.split(';'),
		i, c;

    for (i = 0; i < ca.length; i++)
	{
        c = ca[i];
        while (c.charAt(0) == ' ')
			c = c.substring(1);
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }

    return "";
}

function ask()
{
	var todo = prompt("todo?", "todo...");
	newToDo(todo, true);
}

function newToDo(todo, cook)
{
    var div = document.createElement("DIV"),
		text = document.createTextNode(todo);

	if (todo == null || todo == "")
		return false;

	id++;
	div.setAttribute("onclick", "delToDo(".concat(id.toString()).concat(")"));
	div.id = id;
	div.appendChild(text);
	if (list.firstChild)
		list.insertBefore(div, list.firstChild);
	else
		list.appendChild(div);

	if (cook)
		setCookie(id.toString(), text);
	return true;
}

function delToDo(div)
{
	if (!confirm("Delete... Seriouslee?"))
		return false;

	list.removeChild(document.getElementById(div));

	return true;
}

for (count = 100; count > 0; count--)
	if ((val = getCookie(count.toString())) != "")
		newToDo(val, false);