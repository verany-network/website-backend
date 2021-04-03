package net.verany.websocket;

import net.verany.commands.Command;
import org.java_websocket.WebSocket;
import org.json.JSONObject;

import java.util.HashMap;

public class WebSocketManager {

    private static HashMap<WebSocket, WebSocketClient> clients = new HashMap<>();
    private static HashMap<String, Command> commands = new HashMap<>();

    public static void manage(WebSocket socket, String s) {
        JSONObject obj = null;
        try {
            obj = new JSONObject(s);
        } catch (Exception ignored) {
            return;
        }
        if (!obj.keySet().contains("cmd"))
            return;

        String cmd = obj.getString("cmd");
        WebSocketRequest request = new WebSocketRequest(getClient(socket), obj);
        if (commands.containsKey(cmd))
            commands.get(cmd).onCommand(request);
    }

    public static void registerCommand(String cmd, Command command) {
        commands.put(cmd, command);
    }

    public static WebSocketClient getClient(WebSocket socket) {
        if (!getClients().containsKey(socket))
            getClients().put(socket, new WebSocketClient(socket));
        return getClients().get(socket);
    }

    public static HashMap<WebSocket, WebSocketClient> getClients() {
        return clients;
    }

}
