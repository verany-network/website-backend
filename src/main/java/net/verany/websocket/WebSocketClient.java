package net.verany.websocket;

import lombok.Getter;
import lombok.RequiredArgsConstructor;
import lombok.Setter;
import org.java_websocket.WebSocket;

@Getter
@Setter
@RequiredArgsConstructor
public class WebSocketClient {

    private final WebSocket socket;
    private String name;
    private int id, key;

    public void send(String message){
        socket.send(message);
    }
}
