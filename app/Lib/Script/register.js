var usertype,name,password,email,contact;
function reg_next_step(inputId,callEleId)
{
			
    if(callEleId=="reg-cust")
    {
        usertype="customer";
    }
    else if(callEleId=="reg-shop")
    {
        usertype="shopkeeper";
    }
    if(inputId=="reg-step1")
    {
        document.getElementById("reg-step2").className="reg-form";
    }
    if(inputId=="reg-step2")
    {
        document.getElementById("reg-step3").className="reg-form";
    }
    if(inputId=="reg-step3")
    {
        document.getElementById("reg-step4").className="reg-form";
    }
    document.getElementById(inputId).className="reg-form display-none";
			
}
function Redirect()
{
        window.location="./completeReg.php";
}
function complete_reg()
{
    name=document.getElementById("name").value;
    password=document.getElementById("password").value;
    email=document.getElementById("email").value;
    contact=document.getElementById("contact").value;
    $.ajax({
        type: "GET",
        url: "register.php?name="+name+"&password="+password+"&email="+email+"&phone="+contact+"&type="+usertype,
        dataType: "xml",
        success: function(xml)
        {
            document.write("You will be redirected to dashboard in few seconds...");
            setTimeout('Redirect()', 2000);
        }
    });

}