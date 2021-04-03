package net.verany.websocket.commands;

import net.verany.websocket.WebSocketRequest;

public interface Command {

    void onCommand(WebSocketRequest request);

}
