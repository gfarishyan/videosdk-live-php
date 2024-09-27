<?php

namespace Gfarishyan\VideosdkLivePhp\DataTypes;

interface WebhookInterface {
  public const PARTICIPANT_JOINED = 'participant-joined';
  public const PARTICIPANT_LEFT = 'participant-left';
  public const SESSION_STARTED = 'session-started';
  public const SESSION_ENDED = 'session-ended';
  public const RECORDING_STARTING = 'recording-starting';
  public const RECORDING_STARTED = 'recording-started';
  public const RECORDING_STOPPING = 'recording-stopping';
  public const RECORDING_STOPPED = 'recording-stopped';
  public const RECORDING_FAILED = 'recording-failed';
  public const PARTICIPANT_RECORDING_STARTING = 'participant-recording-starting';
  public const PARTICIPANT_RECORDING_STARTED = 'participant-recording-started';
  public const PARTICIPANT_RECORDING_STOPPING = 'participant-recording-stopping';
  public const PARTICIPANT_RECORDING_STOPPED = 'participant-recording-stopped';
  public const PARTICIPANT_RECORDING_FAILED = 'participant-recording-failed';
  public const PARTICIPANT_TRACK_RECORDING_STARTING = 'participant-track-recording-starting';
  public const PARTICIPANT_TRACK_RECORDING_STARTED = 'participant-track-recording-started';
  public const PARTICIPANT_TRACK_RECORDING_STOPPING = 'participant-track-recording-stopping';
  public const PARTICIPANT_TRACK_RECORDING_STOPPED = 'participant-track-recording-stopped';
  public const PARTICIPANT_TRACK_RECORDING_FAILED = 'participant-track-recording-failed';
  public const TRANSCRIPTION_COMPLETED = 'transcription-completed';
  public const LIVESTREAM_STARTING = 'livestream-starting';
  public const LIVESTREAM_STARTED = 'livestream-started';
  public const LIVESTREAM_STOPPING = 'livestream-stopping';
  public const LIVESTREAM_STOPPED = 'livestream-stopped';
  public const LIVESTREAM_FAILED = 'livestream-failed';
  public const HLS_STARTING = 'hls-starting';
  public const HLS_STARTED = 'hls-started';
  public const HLS_PLAYABLE = 'hls-playable';
  public const HLS_STOPPING = 'hls-stopping';
  public const HLS_STOPPED = 'hls-stopped';
  public const HLS_FAILED = 'hls-failed';

}
