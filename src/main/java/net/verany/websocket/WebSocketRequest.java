package net.verany.websocket;

import org.json.JSONObject;

public class WebSocketRequest {

    private WebSocketClient client;
    private JSONObject request;

    public WebSocketRequest(WebSocketClient client, JSONObject request){
        this.client = client;
        this.request = request;
    }

    public boolean wantAnswer(){
        return request.keySet().contains("id");
    }

    public void answer(JSONObject answer){
        if(wantAnswer())
            client.send(answer.put("id", request.get("id")).toString());
    }

    public JSONObject getRequest() {
        return request;
    }
}
