function redirectToAttempt(select) {
    let value = select.value;
    insertParam('attempt', value)
}
function insertParam(key,value)
{
    key = encodeURIComponent(key); value = encodeURIComponent(value);
    let search = document.location.search;
    let string = key+"="+value;
    let r = new RegExp("(&|\\?)"+key+"=[^\&]*");
    search = search.replace(r,"$1"+string);
    if(!RegExp.$1) {search += (search.length>0 ? '&' : '?') + string;};
    document.location.search = search;
}