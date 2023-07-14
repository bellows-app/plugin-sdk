<?php

namespace Bellows\PluginSdk\Data;

enum RepositoryProvider: string
{
    case GITHUB = 'github';
    case GITLAB = 'gitlab';
    case GITLAB_CUSTOM = 'gitlab-custom';
    case BITBUCKET = 'bitbucket';
    case CUSTOM = 'custom';
}
