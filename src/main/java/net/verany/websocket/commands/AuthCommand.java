package net.verany.websocket.commands;

import net.verany.websocket.WebSocketRequest;
import org.json.JSONObject;

public class AuthCommand implements Command {
    @Override
    public void onCommand(WebSocketRequest request) {
        JSONObject result = new JSONObject();
        JSONObject anfrage = request.getRequest();
        if (request.getRequest().keySet().contains("password")) {
            String password = request.getRequest().getString("password");
        }
        request.answer(result);
    }
}
