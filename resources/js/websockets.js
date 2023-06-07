import './bootstrap';

const channel = Echo.channel('test');

channel.subscribed(()=> {
    console.log("FUCKK")
})

channel.listen('Test',(event)=>{
    console.log(event)
});