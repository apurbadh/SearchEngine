
async function call() {
    await fetch("https://en.wikipedia.org/w/api.php?action=query&list=search&srsearch=apurba&prop=info&inprop=url&utf8=&format=json")
        .then((res) => console.log(res))
}
call()
