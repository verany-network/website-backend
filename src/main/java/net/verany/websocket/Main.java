package net.verany.websocket;

import com.google.gson.Gson;
import net.verany.websocket.commands.AuthCommand;
import net.verany.websocket.database.DatabaseManager;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.SneakyThrows;
import org.bson.Document;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.stream.Collectors;

public class Main {

    public static DatabaseManager databaseManager;

    @SneakyThrows
    public static void main(String[] args) {
        MongoData data = new Gson().fromJson(getResourceFileAsString("data.json"), MongoData.class);

        databaseManager = new DatabaseManager(data.getUsername(), data.getHostname(), data.getPassword(), "web");
        databaseManager.connect();

        Runtime.getRuntime().addShutdownHook(new Thread(() -> databaseManager.disconnect()));

        SocketServer server = new SocketServer(887);
        server.setReuseAddr(true);
        server.start();

        initCommands();
    }

    private static void initCommands() {
        WebSocketManager.registerCommand("auth", new AuthCommand());
    }

    private static String getResourceFileAsString(String file) throws IOException {
        ClassLoader classLoader = ClassLoader.getSystemClassLoader();
        try (InputStream is = classLoader.getResourceAsStream(file)) {
            if (is == null) return null;
            try (InputStreamReader isr = new InputStreamReader(is);
                 BufferedReader reader = new BufferedReader(isr)) {
                return reader.lines().collect(Collectors.joining(System.lineSeparator()));
            }
        }
    }

    @AllArgsConstructor
    @Getter
    public static class MongoData {
        private final String username, password, hostname;
    }

}
