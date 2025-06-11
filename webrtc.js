function getLocalIPs(callback) {
  const ips = [];
  const pc = new RTCPeerConnection({iceServers: []});
  pc.createDataChannel("");
  pc.createOffer().then(offer => pc.setLocalDescription(offer));
  pc.onicecandidate = (event) => {
    if (!event || !event.candidate) {
      callback(ips);
      return;
    }
    const parts = event.candidate.candidate.split(" ");
    const ip = parts[4];
    if (!ips.includes(ip)) ips.push(ip);
  };
}

getLocalIPs((ips) => {
  document.getElementById("local-ip").textContent = ips.join(", ");
});
