<?php


namespace Jdlx\Slack;


/**
 * Quick encapsulation of the slack sender allowing us
 * to create an easy to reference set of slack "persona"
 *
 * Class Sender
 * @package App\Models
 */
class Sender
{
    const DEFAULT = "default";
    const TASK_RUNNER = "task_runner";
    const WEBHOOK = "webhook";
    const WATCHER = "watcher";
    const SYNCBOT = "syncbot";

    protected static $persona = [
        self::DEFAULT => ["System", ":robot_face:"],
        self::TASK_RUNNER => ["Task Runner", ":robot_face:"],
        self::WATCHER => ["Watcher", ":warning:"],
        self::WEBHOOK => ["Shopify Webhook", ":blond-haired-woman:"],
        self::SYNCBOT => ["SyncBot", ":face_palm:"]
    ];

    public $name;
    public $icon;

    /**
     * Sender constructor.
     *
     * @param string $name Sender name
     * @param string $icon Associated Icon
     */
    public function __construct($name = "System", $icon = ":robot-face:")
    {
        $this->name = $name;
        $this->icon = $icon;
    }

    /**
     * Create a sender object that can be used. Will use one of the
     * persona defined by this class constants, or class Sender::DEFAULT
     * if none is found.
     *
     * @param string $persona One of the persona defined by class constants Sender::[persona]
     * @return Sender
     */
    public static function persona($persona)
    {
        if (!isset(self::$persona[$persona])) {
            $persona = self::DEFAULT;
        }
        list($name, $icon) = self::$persona[$persona];
        return new Sender($name, $icon);
    }
}
