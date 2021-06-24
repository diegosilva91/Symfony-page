$('#toPDf').click(function() {
    let contentPDF= window.open('', '_blank' );
    contentPDF.document.write(`<html><head><title>TO PDF</title></head><body >`);
    contentPDF.document.write(document.getElementById("toPrint").innerHTML);
    contentPDF.document.write('</body></html>');
    contentPDF.document.close();
    contentPDF.focus();
    contentPDF.print();
    contentPDF.close();
    return true;
});